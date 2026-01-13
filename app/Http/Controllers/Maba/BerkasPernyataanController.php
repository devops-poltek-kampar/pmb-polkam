<?php

namespace App\Http\Controllers\Maba;

use App\Http\Controllers\Controller;
use App\Models\MasterProgramStudiModel;
use App\Models\PMBBerkasPernyataanModel;
use App\Models\PMBKelulusanModel;
use App\Models\PMBRegistrasiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BerkasPernyataanController extends Controller
{
    public function index()
    {
        $dataRegistrasi = PMBRegistrasiModel::where(['pmb_users_id' => session('id')])->get(['nomor_registrasi', 'status_bayar_registrasi', 'status_registrasi'])->first();
        // return response()->json($dataRegistrasi);
        if (!$dataRegistrasi) {
            return redirect('/user/dashboard')->with("message", "Silahkan melakukan registrasi terlebih dahulu");
        }

        $kelulusan = PMBKelulusanModel::where(['nomor_registrasi' => $dataRegistrasi->nomor_registrasi])->get(['id', 'kode_prodi', "nomor_registrasi"])->first();
        // return response()->json($kelulusan);

        if ($kelulusan->status != "LULUS") {
            return view('maba.berkas-pernyataan.403');
            // return redirect('/user/pengajuan-berkas')->with('message', "Silahkan menyelesaikan tahap pengajuan berkas terlebih dahulu!");
        }

        $berkasPernyataan = PMBBerkasPernyataanModel::where(['nomor_registrasi' => $dataRegistrasi->nomor_registrasi])->first();
        // return response()->json($berkasPernyataan);
        $prodi = MasterProgramStudiModel::select(['kode_prodi', 'nama'])->get();
        // return response()->json($prodi);
        return view('maba.berkas-pernyataan.index', compact('dataRegistrasi', 'kelulusan', 'prodi', 'berkasPernyataan'));
    }

    public function upload_berkas(Request $request)
    {
        $request->validate(['file' => ['required', 'mimes:pdf'], 'nomor_registrasi' => ['required']]);
        $berkas = PMBBerkasPernyataanModel::where("nomor_registrasi", $request->post('nomor_registrasi'))->first();
        if ($berkas) {
            $berkas->path = $request->file('file')->store("/uploads" . "/" . session('email'));
            $berkas->status = "Review";
            $berkas->save();
            return redirect('/user/berkas-pernyataan')->with('message', "Berhasil edit berkas pernyataan");
        }

        $berkasPernyataan = PMBBerkasPernyataanModel::create([
            "id" => strtoupper(Str::random(20)),
            "nomor_registrasi" => $request->post('nomor_registrasi'),
            "path" => $request->file('file')->store("/uploads" . "/" . session('email')),
            "status" => "Review"
        ]);

        if ($berkasPernyataan) {
            return redirect('/user/berkas-pernyataan')->with('message', "Berhasil upload berkas pernyataan");
        }

        return redirect('/user/berkas-pernyataan')->with('failed', "Gagal upload berkas pernyataan");
    }
}
