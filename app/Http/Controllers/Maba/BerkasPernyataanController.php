<?php

namespace App\Http\Controllers\Maba;

use App\Http\Controllers\Controller;
use App\Models\MasterProgramStudiModel;
use App\Models\PMBBerkasPernyataanModel;
use App\Models\PMBFileBerkasPernyataanModel;
use App\Models\PMBKelulusanModel;
use App\Models\PMBRegistrasiModel;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Str;

use function Symfony\Component\Clock\now;

class BerkasPernyataanController extends Controller
{
    public function index()
    {
        $dataRegistrasi = PMBRegistrasiModel::where(['pmb_users_id' => session('id')])->get(['nomor_registrasi', 'status_bayar_registrasi', 'status_registrasi'])->first();
        // return response()->json($dataRegistrasi);
        if (!$dataRegistrasi) {
            return redirect('/user/dashboard')->with("message", "Silahkan melakukan registrasi terlebih dahulu");
        }

        $kelulusan = PMBKelulusanModel::where(['nomor_registrasi' => $dataRegistrasi->nomor_registrasi])->get(['id', 'status', 'kode_prodi', "nomor_registrasi"])->first();
        // return response()->json($kelulusan);

        if (!$kelulusan || $kelulusan->status != "LULUS") {
            return view('maba.berkas-pernyataan.403');

            // return redirect('/user/pengajuan-berkas')->with('message', "Silahkan menyelesaikan tahap pengajuan berkas terlebih dahulu!");
        }

        $berkasPernyataan = PMBBerkasPernyataanModel::with(['file_pernyataan'])->where(['nomor_registrasi' => $dataRegistrasi->nomor_registrasi])->first();
        // return response()->json($berkasPernyataan);
        // $prodi = MasterProgramStudiModel::select(['kode_prodi', 'nama'])->get();
        // return response()->json($prodi);
        return view('maba.berkas-pernyataan.index', compact('dataRegistrasi', 'kelulusan', 'berkasPernyataan'));
    }

    public function upload_berkas(Request $request)
    {

        $request->validate([
            'persetujuan_hukum' => ['required', 'mimes:pdf'],
            "persetujuan_hukum_kip" => ['mimes:pdf'],
            "kesediaan_kip" => ['mimes:pdf']
        ]);

        try {

            $nomorRegistrasi = $request->post('nomor_registrasi');
            $file = ['persetujuan_hukum', 'persetujuan_hukum_kip', 'kesediaan_kip'];

            DB::beginTransaction();

            $berkasPernyataan = PMBBerkasPernyataanModel::where(['nomor_registrasi' => $nomorRegistrasi])->first();

            if (!$berkasPernyataan) {

                $berkas = PMBBerkasPernyataanModel::create([
                    "id" => strtoupper(Str::random(20)),
                    "nomor_registrasi" => $nomorRegistrasi,
                    "status" => 'Review'
                ]);

                if ($berkas) {
                    $fileBerkas = [];
                    foreach ($file as $key => $value) {
                        if ($request->hasFile($value)) {
                            $fileBerkas[] = [
                                'id' => strtoupper(Str::random(20)),
                                "pmb_berkas_pernyataan_id" => $berkas->id,
                                "path" => $request->file($value)->store("/uploads" . "/" . session('email')),
                                "kategori" => $value,
                                "status" => "Review",
                                'created_at' => now("Asia/Jakarta"),
                                "updated_at" => now("Asia/Jakarta")
                            ];
                        }
                    }

                    $resultStoreFile = PMBFileBerkasPernyataanModel::insert($fileBerkas);

                    if ($resultStoreFile > 0) {
                        DB::commit();
                        return redirect('/user/berkas-pernyataan')->with('message', "Berhasil upload berkas pernyataan");
                    } else {
                        DB::rollBack();
                        return redirect('/user/berkas-pernyataan')->with('failed', "Gagal upload berkas pernyataan!");
                    }
                }
            } else {
                DB::rollBack();
                return back()->with('failed', 'Gagal simpan data!');
            }
        } catch (Exception $ex) {
            DB::rollBack();
            Log::log("debug", "Error Message : " . $ex->getMessage());
            return back()->with("error", "Ada Kesalahan!");
        }



        // $registrasi = PMBRegistrasiModel::select('id', 'nomor_registrasi')->where(['pmb_users_id' => session('id')])->first();
        // return response()->json($registrasi);
        // $request->validate([
        //     'file' => ['required', 'mimes:pdf'], 'nomor_registrasi' => ['required']]);
        // $berkas = PMBBerkasPernyataanModel::where("nomor_registrasi", $request->post('nomor_registrasi'))->first();
        // if ($berkas) {
        //     $berkas->path = $request->file('file')->store("/uploads" . "/" . session('email'));
        //     $berkas->status = "Review";
        //     $berkas->save();
        //     return redirect('/user/berkas-pernyataan')->with('message', "Berhasil edit berkas pernyataan");
        // }

        // $berkasPernyataan = PMBBerkasPernyataanModel::create([
        //     "id" => strtoupper(Str::random(20)),
        //     "nomor_registrasi" => $request->post('nomor_registrasi'),
        //     "path" => $request->file('file')->store("/uploads" . "/" . session('email')),
        //     "status" => "Review"
        // ]);

        // if ($berkasPernyataan) {
        //     return redirect('/user/berkas-pernyataan')->with('message', "Berhasil upload berkas pernyataan");
        // }

        // return redirect('/user/berkas-pernyataan')->with('failed', "Gagal upload berkas pernyataan");
    }
}
