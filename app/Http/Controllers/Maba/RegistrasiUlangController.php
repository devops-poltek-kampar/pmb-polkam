<?php

namespace App\Http\Controllers\Maba;

use App\Http\Controllers\Controller;
use App\Models\PMBBuktiPembayaranModel;
use App\Models\PMBDokumenJalurModel;
use App\Models\PMBPengajuanBerkasModel;
use App\Models\PMBRegistrasiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class RegistrasiUlangController extends Controller
{
    public function index()
    {
        $dataRegistrasi = PMBRegistrasiModel::with(['bukti_pembayaran' => function ($queryBuktiPembayaran) {
            return $queryBuktiPembayaran->where('kategori', "Daftar Ulang");
        }])->where(['pmb_users_id' => session('id')])->get(['id', 'pmb_jalur_masuk_id', 'nomor_registrasi'])->first();

        // return response()->json($dataRegistrasi);
        if (!$dataRegistrasi) {
            return redirect('/user/dashboard')->with('error-message', 'Silahkan melakukan registrasi terlebih dahulu');
        }

        $pengajuanBerkas = PMBPengajuanBerkasModel::where(['nomor_registrasi' => $dataRegistrasi->nomor_registrasi])->first();

        if (!$pengajuanBerkas || $pengajuanBerkas->status != "Verified") {
            return view('maba.registrasi-ulang.403');
            // return redirect('/user/data-registrasi')->with("message", "Silahkan menyelesaikan tahap registrasi!");
        }

        // if ($pengajuanBerkas->status != "Verified") {
        //     return redirect('/user/pengajuan-berkas')->with("message", "Silahkan menyelesaikan tahap pengajuan berkas terlebih dahulu!");
        // }

        // $dokumenJalur = PMBDokumenJalurModel::where(['pmb_jalur_masuk_id' => $dataRegistrasi->pmb_jalur_masuk_id])->get();
        // return response()->json($dokumenJalur);
        return view('maba.registrasi-ulang.index', compact('dataRegistrasi', 'pengajuanBerkas'));
    }

    public function upload_bukti_pembayaran_daftar_ulang(Request $request)
    {

        $dataValidation = $request->validate(['file_pembayaran' => ['required', 'mimes:jpg,jpeg,png'], 'nomor_registrasi' => ['required']]);

        $buktiPembayaran = PMBBuktiPembayaranModel::where(['pmb_registrasi_nomor_registrasi' => $dataValidation['nomor_registrasi'], "kategori" => "Daftar Ulang"])->first();

        if ($buktiPembayaran) {
            Storage::delete($buktiPembayaran->path);
            $resultStoreFile = $request->file('file_pembayaran')->store("/uploads" . "/" . session('email'));
            $buktiPembayaran->path = $resultStoreFile;
            $buktiPembayaran->status = "Pending";
            $buktiPembayaran->save();
            return redirect('/user/registrasi-ulang')->with('success-pembayaran-message', 'Berhasil edit pembayaran');
        } else {
            $resultStoreFile = $request->file('file_pembayaran')->store("/uploads" . "/" . session('email'));
            $resultPembayaran = PMBBuktiPembayaranModel::create([
                "id" => strtoupper(Str::random(20)),
                "pmb_registrasi_nomor_registrasi" => $request->post('nomor_registrasi'),
                "path" => $resultStoreFile,
                "status" => "Pending",
                "kategori" => "Daftar Ulang"
            ]);

            if ($resultPembayaran) {
                return redirect('/user/registrasi-ulang')->with('success-pembayaran-message', "Berhasil simpan data pembayaran!");
            }
            return redirect('/user/registrasi-ulang')->with('error-pembayaran-message', "Gagal simpan data pembayaran!");
        }
    }
}
