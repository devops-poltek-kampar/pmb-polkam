<?php

namespace App\Http\Controllers\Maba;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormRegistrasiRequest;
use App\Http\Requests\FormUploadBuktiRegistrasiRequest;
use App\Models\MasterProgramStudiModel;
use App\Models\PMBBerkasModel;
use App\Models\PMBBuktiPembayaranModel;
use App\Models\PMBDokumenJalurModel;
use App\Models\PMBDokumenRegistrasiModel;
use App\Models\PMBJalurMasukModel;
use App\Models\PMBPengajuanBerkasModel;
use App\Models\PMBRegistrasiModel;
use App\Services\RegistrasiService;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use function Symfony\Component\Clock\now;

class RegistrasiController extends Controller
{

    private RegistrasiService $registrasiService;

    public function __construct(RegistrasiService $registrasiService)
    {
        $this->registrasiService = $registrasiService;
    }

    public function form_registrasi(Request $request)
    {
        try {
            $dataJalur = PMBJalurMasukModel::with(['prodi', 'jalur' => function ($queryJalur) {
                return $queryJalur->select(['id', 'nama']);
            }, 'gelombang' => function ($queryGelombang) {
                return $queryGelombang->select(['id', 'nama', 'tahun']);
            }])->where(['id' => $request->get('pmb_jalur_masuk_id')])->get(['id', 'pmb_gelombang_id', 'pmb_jalur_id', 'biaya_registrasi', 'keterangan'])->first(); //PMBJalurMasukModel::find($request->get('pmb_jalur_id'));
            return view('maba.form-registrasi', compact('dataJalur'));
        } catch (Exception $ex) {
            Log::channel('registrasi')->error('internal server error', [
                "message" => $ex->getMessage(),
                "waktu" => Carbon::now()->translatedFormat("j F Y H:i"),
            ]);
            throw new Exception($ex->getMessage(), 1);
        }
    }

    public function upload_berkas()
    {
        try {
            $pengajuanBerkas = PMBPengajuanBerkasModel::with(['berkas'])->where('pmb_users_id', session('id'))->get()->first();

            $dataRegistrasi = PMBRegistrasiModel::with(['users' => function ($query) {
                return $query->select(['id', 'username', 'email']);
            }, "jalur_masuk" => function ($queryJalurMasuk) {
                return $queryJalurMasuk->with(["jalur", 'gelombang' => function ($queryGelombang) {
                    return $queryGelombang->select(['id', "nama", "tahun"]);
                }])->select(["id", 'pmb_jalur_id', 'pmb_gelombang_id']);
            }])->where(['pmb_users_id' => session('id')])->get(['nomor_registrasi', "pmb_jalur_masuk_id", 'nama', 'pmb_users_id', 'id', 'status_bayar_registrasi'])->first();

            if (!$dataRegistrasi) {
                return redirect('/user/dashboard')->with('message', 'Silahkan melakukan registrasi terlebih dahulu!');
            }

            $dokumenJalur = $dataRegistrasi->status_bayar_registrasi == "Done" ? PMBDokumenJalurModel::where(['pmb_jalur_masuk_id' => $dataRegistrasi->pmb_jalur_masuk_id])->get() : null;

            return view('maba.upload-berkas',  compact('dataRegistrasi', 'dokumenJalur', 'pengajuanBerkas'));
        } catch (Exception $ex) {
            Log::channel('registrasi')->error('internal server error', [
                "message" => $ex->getMessage(),
                "waktu" => Carbon::now()->translatedFormat("j F Y H:i"),
            ]);
            throw new Exception($ex->getMessage(), 1);
        }
    }

    public function data_registrasi()
    {
        try {

            $dataRegistrasi = PMBRegistrasiModel::with(["bukti_pembayaran" => function ($queryBuktiBayar) {
                return $queryBuktiBayar->where('kategori', "Registrasi")->select(['pmb_registrasi_nomor_registrasi', 'id', 'path', 'status', 'kategori']);
            }, 'users' => function ($query) {
                return $query->select(['id', 'username', 'email']);
            }, "jalur_masuk" => function ($queryJalurMasuk) {
                return $queryJalurMasuk->with(["jalur", 'gelombang' => function ($queryGelombang) {
                    return $queryGelombang->select(['id', "nama", "tahun"]);
                }])->select(["id", 'pmb_jalur_id', 'pmb_gelombang_id']);
            }])->where(['pmb_users_id' => session('id')])->get(['nomor_registrasi', 'status_registrasi', "pmb_jalur_masuk_id", 'nama', 'pmb_users_id', 'id', 'status_bayar_registrasi'])->first();

            if (!$dataRegistrasi) {
                return redirect('/user/dashboard')->with('message', 'Silahkan melakukan registrasi terlebih dahulu!');
            }

            return view('maba.data-registrasi.index', compact('dataRegistrasi'));
        } catch (Exception $ex) {
            Log::channel('registrasi')->error('internal server error', [
                "message" => $ex->getMessage(),
                "waktu" => Carbon::now()->translatedFormat("j F Y H:i"),
            ]);
            throw new Exception($ex->getMessage(), 1);
        }
    }

    public function save_registrasi(FormRegistrasiRequest $request)
    {

        try {
            $dataRegistrasi = $request->validated();
            $dataRegistrasi['nomor_registrasi'] = fake()->numberBetween(100000000000000, 999999999999999); //Str::random(14);
            $dataRegistrasi['pmb_users_id'] = session("id");
            $dataRegistrasi['id'] = strtoupper(Str::random(20));

            $registrasi = PMBRegistrasiModel::create($dataRegistrasi);
            $file = [];
            $fileFieldNames = ['pas_foto', "ktp"];
            foreach ($fileFieldNames as $key => $value) {
                if ($request->hasFile($value)) {
                    $file[] = [
                        "id" => strtoupper(Str::random(20)),
                        'pmb_registrasi_id' => $registrasi->id,
                        'pmb_jalur_masuk_id' => $dataRegistrasi['pmb_jalur_masuk_id'],
                        "path" => $request->file($value)->store("uploads/" . session("email")),
                        "nama" => $request->file($value)->getClientOriginalName(),
                        "kategori" => $value,
                        'created_at' => now('Asia/Jakarta'),
                        "updated_at" => now("Asia/Jakarta")
                    ];
                }
            }

            // return response()->json($file);
            $resultStoreFile = PMBDokumenRegistrasiModel::insert($file);

            if ($registrasi && $resultStoreFile > 0) {
                return redirect('/user/data-registrasi')->with("message", "Berhasil simpan formulir registrasi!");
            }
        } catch (Exception $ex) {
            Log::channel('registrasi')->error('Gagal simpan registrasi!', [
                "message" => $ex->getMessage(),
                "trace" => $ex->getTraceAsString()
            ]);
            throw new Exception($ex->getMessage(), 1);
        }
    }

    public function detail_registrasi($registrasiId)
    {

        $registrasi = PMBRegistrasiModel::with([
            'prodi_1:kode_prodi,nama',
            'prodi_2:kode_prodi,nama',
            'users:id,username,email,nomor_hp',
            'lampiran:id,pmb_registrasi_id,nama,path,status,kategori',
            'jalur_masuk:id,pmb_gelombang_id,pmb_jalur_id',
            'jalur_masuk.gelombang:id,nama,tahun',
            'jalur_masuk.jalur:id,nama',
        ])->where(['id' => $registrasiId])->first();
        if (!$registrasi) {
            return redirect('/user/dashboard')->with('message', "Silahkan melakukan registrasi terlebih dahulu");
        }
        return view('maba.data-registrasi.detail-registrasi', compact('registrasi'));
    }

    public function form_upload_bukti_registrasi($nomorRegistrasi)
    {
        $dataRegistrasi = $this->registrasiService->getRegistrasiByNomorRegistrasi($nomorRegistrasi);
        return view('maba.data-registrasi.form-upload-bukti-bayar-registrasi', compact('dataRegistrasi'));
    }

    public function upload_bukti_pembayaran_registrasi(FormUploadBuktiRegistrasiRequest $request)
    {
        $dataUploadBuktiRegistrasi = $request->validated();
        $resultStoreFileBuktiRegistrasi = $request->file('bukti_registrasi')->store("uploads/" . session("email"));
        $resultStoreBuktiRegistrasi = $this->registrasiService->storeBuktiPembayaranRegistrasi([
            "id" => strtoupper(Str::random(20)),
            'pmb_registrasi_nomor_registrasi' => $dataUploadBuktiRegistrasi['pmb_registrasi_nomor_registrasi'],
            "path" => $resultStoreFileBuktiRegistrasi,
            "status" => "Pending",
            "kategori" => "Registrasi",
        ]);
        if ($resultStoreBuktiRegistrasi['status'] == 201) {
            return redirect($resultStoreBuktiRegistrasi['path'])->with("message", $resultStoreBuktiRegistrasi['message']);
        }
        return back()->with("message", $resultStoreBuktiRegistrasi['message']);
    }
}
