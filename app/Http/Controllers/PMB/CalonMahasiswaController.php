<?php

namespace App\Http\Controllers\PMB;

use App\DataTables\DataRegistrasiDataTable;
use App\Http\Controllers\Controller;
use App\Mail\AccFormulirMail;
use App\Models\PMBCBTModel;
use App\Models\PMBRegistrasiModel;
use App\Services\RegistrasiService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class CalonMahasiswaController extends Controller
{

    private RegistrasiService $registrasiService;
    public function __construct(RegistrasiService $registrasiService)
    {
        $this->registrasiService = $registrasiService;
    }

    public function data_registrasi()
    {
        $dataRegistrasi = $this->registrasiService->getRegistrasiWithStructRegis();
        // return response()->json($dataRegistrasi);
        return view('maba.data-registrasi', compact('dataRegistrasi'));
    }

    public function index(DataRegistrasiDataTable $dataTable)
    {
        return $dataTable->render("pmb.calon-mahasiswa.data-registrasi");
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
        // $registrasi = PMBRegistrasiModel::with(['users' => function ($queryUsers) {
        //     return $queryUsers->select(['id', 'username', 'email', 'nomor_hp']);
        // }, 'lampiran' => function ($queryLampiran) {
        //     return $queryLampiran->select(['pmb_registrasi_id', 'nama', 'path', 'status', 'kategori']);
        // }, 'jalur_masuk'])->where(['id' => $registrasiId])->first(); //$this->registrasiService->getRegistrasiById($registrasiId);
        // return response()->json($registrasi);
        return view('pmb.calon-mahasiswa.detail-registrasi', compact('registrasi'));
    }

    public function acc_formulir($nomorRegistrasi)
    {
        try {
            // $resultUpdate = PMBRegistrasiModel::where(['nomor_registrasi' => $nomorRegistrasi])->update(['status_registrasi' => "Approve"]);
            $registrasi = PMBRegistrasiModel::with(['users' => function ($queryUsers) {
                return $queryUsers->select(['id', 'username', 'email', 'nomor_hp']);
            }])->where(['nomor_registrasi' => $nomorRegistrasi])->get(['id', 'nomor_registrasi', 'nama', 'pmb_users_id', 'status_bayar_registrasi', 'status_registrasi'])->first();
            if ($registrasi) {

                // return response()->json($registrasi);

                if ($registrasi->status_bayar_registrasi != "Done") {
                    return redirect("/pmb/calon-mahasiswa/detail-registrasi/" . $registrasi->id)->with('info', "Pembayaran registrasi belum diselesaikan!");
                }

                if ($registrasi->status_registrasi == "Approve") {
                    return redirect('/pmb/calon-mahasiswa')->with("info", "Sudah diverifikasi");
                }

                // return response()->json($registrasi);

                $registrasi->status_registrasi = "Approve";
                if ($registrasi->save()) {

                    Mail::to($registrasi->users->email)->send(new AccFormulirMail($registrasi));

                    PMBCBTModel::create([
                        "id" => strtoupper(Str::random(20)),
                        "nomor_registrasi" => $nomorRegistrasi,
                        "status" => "Tidak Lulus",
                        "aktif" => "Y"
                    ]);
                    //buat data cbt untuk maba masuk ke tahap cbt
                    return redirect('/pmb/calon-mahasiswa')->with('message', "Mahasiswa baru dinyatakan lulus. mahasiswa masuk ke tahap CBT!");
                }
            }

            return back()->with("error-message", "Gagal update data!");
        } catch (Exception $exception) {
            Log::channel('registrasi')->error("Failed Acc Formulir!", [
                "message" => $exception->getMessage(),
                'trace' => $exception->getTraceAsString()
            ]);
            throw new Exception($exception->getMessage(), 1);
        }
    }
}
