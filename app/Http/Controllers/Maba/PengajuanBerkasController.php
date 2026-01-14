<?php

namespace App\Http\Controllers\Maba;

use App\Http\Controllers\Controller;
use App\Models\PMBBerkasModel;
use App\Models\PMBDokumenJalurModel;
use App\Models\PMBPengajuanBerkasModel;
use App\Models\PMBRegistrasiModel;
use Illuminate\Http\Request;
use App\Services\RegistrasiService;
use Illuminate\Support\Str;

class PengajuanBerkasController extends Controller
{

    private RegistrasiService $registrasiService;

    public function __construct(RegistrasiService $registrasiService)
    {
        $this->registrasiService = $registrasiService;
    }


    public function index()
    {

        $dataRegistrasi = PMBRegistrasiModel::where(['pmb_users_id' => session('id')])->get(['id', 'status_registrasi', 'pmb_jalur_masuk_id', 'nomor_registrasi'])->first();
        // return response()->json($dataRegistrasi);
        if (!$dataRegistrasi) { //jika data formulir  registrasi tidak ada
            return redirect('/user/dashboard')->with('message', 'Silahkan melakukan registrasi terlebih dahulu');
        }

        if ($dataRegistrasi->status_registrasi != "Approve") { //jika data formulir registrasi ada tapi status nya tidak approve
            return redirect('/user/data-registrasi')->with('failed', 'Silahkan menyelesaikan tahap registrasi terlebih dahulu!');
        }

        $pengajuanBerkas = PMBPengajuanBerkasModel::with(['registrasi' => function ($queryRegistrasi) {
            return $queryRegistrasi->with(['jalur_masuk' => function ($queryJalurMasuk) {
                return $queryJalurMasuk->with(['gelombang' => function ($queryGelombang) {
                    return $queryGelombang->select(['id', 'nama', 'tahun']);
                }, 'jalur' => function ($queryJalur) {
                    return $queryJalur->select(['id', 'nama']);
                }])->select(['id', 'pmb_gelombang_id', 'pmb_jalur_id']);
            }])->select(['id', 'nomor_registrasi', 'pmb_jalur_masuk_id', 'nama']);
        }, 'berkas' => function ($queryBerkas) {
            return $queryBerkas->select(['id', 'pmb_pengajuan_berkas_id', 'path', 'kategori', "status", "message"]);
        }])->where(['nomor_registrasi' => $dataRegistrasi->nomor_registrasi])->lazy()->first();
        $dokumenJalur = PMBDokumenJalurModel::where(['pmb_jalur_masuk_id' => $dataRegistrasi->pmb_jalur_masuk_id])->lazy();

        // return response()->json($pengajuanBerkas);

        return view('maba.pengajuan-berkas.index', compact('dataRegistrasi', 'pengajuanBerkas', 'dokumenJalur'));
    }

    public function edit_berkas(Request $request)
    {

        $request->validate([$request->post('name_attribute') => ['required']]);

        $resultStoreFile = $request->file($request->post('name_attribute'))->store("/uploads" . "/" . session('email'));
        $berkas = PMBBerkasModel::find($request->post('id'));
        if ($berkas) {
            $berkas->path = $resultStoreFile;
            $berkas->save();
            return redirect('/user/data-registrasi')->with('message', "Berhasil edit berkas!");
        }

        return redirect('/user/data-registrasi')->with('message', 'Gagal edit berkas!');
    }

    public function upload_dokumen_registrasi(Request $request)
    {

        $jalur = PMBDokumenJalurModel::where(['pmb_jalur_masuk_id' => $request->post('pmb_jalur_masuk_id')])->get(['name_attribute', 'tipe', 'sifat']);
        $rulesAndMessage = $this->registrasiService->setRulesValidasi($jalur);
        $data = $request->validate($rulesAndMessage['rules'], $rulesAndMessage['message']); //validasi rule file

        $resultCreatePengajuanBerkas = PMBPengajuanBerkasModel::create([
            "id" => strtoupper(Str::random(20)),
            "nomor_registrasi" => $request->post('nomor_registrasi'),
            "pmb_jalur_masuk_id" => $request->post('pmb_jalur_masuk_id'),
            "pmb_users_id" => session('id'),
            "status" => "Review"
        ]);

        if ($resultCreatePengajuanBerkas) {
            $dataFile = [];
            foreach ($data as $key => $value) {
                $resultStoreFile = $request->file($key)->store("/uploads" . "/" . session('email'));
                $dataFile[] = [
                    "id" => strtoupper(Str::random(20)),
                    "nama" => $request->file($key)->getClientOriginalName(),
                    "pmb_pengajuan_berkas_id" => $resultCreatePengajuanBerkas->id,
                    // "pmb_dokumen_jalur_id" => "ddd",
                    "path" => $resultStoreFile,
                    "kategori" => $key,
                    "status" => "Review",
                    "created_at" => now(),
                    "updated_at" => now()
                ];
            }

            $resultStoreFileBerkas = PMBBerkasModel::insert($dataFile); //kita berhasil return true

            if ($resultStoreFileBerkas) {
                return redirect('/user/pengajuan-berkas')->with("message", "Berhasil upload berkas registrasi");
            }
        }

        return redirect('/user/pengajuan-berkas')->with("error-message", "Gagal upload berkas registrasi");
    }
}
