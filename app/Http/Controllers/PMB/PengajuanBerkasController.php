<?php

namespace App\Http\Controllers\PMB;

use App\DataTables\PengajuanBerkasDataTable;
use App\Http\Controllers\Controller;
use App\Models\PMBBerkasModel;
use App\Models\PMBCBTModel;
use App\Models\PMBKelulusanModel;
use App\Models\PMBPengajuanBerkasModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PengajuanBerkasController extends Controller
{
    public function index(PengajuanBerkasDataTable $dataTable)
    {
        return $dataTable->render('pmb.pengajuan-berkas.index');
    }

    public function detail($pengajuanBerkasId)
    {
        $berkas = PMBPengajuanBerkasModel::with(['registrasi' => function ($queryRegistrasi) {
            return $queryRegistrasi->with(['lampiran' => function ($queryLampiran) {
                return $queryLampiran->select(['id', 'pmb_registrasi_id', 'path']);
            }, 'jalur_masuk' => function ($queryJalurMasuk) {
                return $queryJalurMasuk->with(['gelombang' => function ($queryGelombang) {
                    return $queryGelombang->select(['id', 'nama', 'tahun']);
                }, 'jalur' => function ($queryJalur) {
                    return $queryJalur->select(['id', 'nama']);
                }])->select(['id', 'pmb_gelombang_id', 'pmb_jalur_id']);
            }])->select(['id', 'pmb_jalur_masuk_id', 'nama', 'nomor_registrasi']);
        }, 'berkas' => function ($queryBerkas) {
            return $queryBerkas->select(['id', 'pmb_pengajuan_berkas_id', 'message', 'path', 'nama', 'kategori', 'status']);
        }])->where(['id' => $pengajuanBerkasId])->first();
        // $berkas = PMBBerkasModel::with([])->where(['pmb_pengajuan_berkas_id' => $pengajuanBerkasId])->get();
        // return response()->json($berkas);
        return view('pmb.pengajuan-berkas.detail-pengajuan', compact('berkas'));
    }

    public function lulus(Request $request)
    {

        // return response()->json($request->all());
        $berkas = PMBBerkasModel::where(['pmb_pengajuan_berkas_id' => $request->post('pmb_pengajuan_berkas_id')])->get();

        foreach ($berkas as $key => $value) {
            if ($berkas[$key]['status'] == "Review" || $berkas[$key]['status'] == "Reject") {
                return redirect('/pmb/pengajuan-berkas')->with("error-message", "Berkas belum lengkap");
            }
        }

        $pengajuanBerkas = PMBPengajuanBerkasModel::find($request->post('pmb_pengajuan_berkas_id'));

        if ($pengajuanBerkas->status == "Verified") {
            return back()->with("message", "Sudah verifikasi!");
        }
        if ($pengajuanBerkas) {
            $pengajuanBerkas->status = "Verified";
            $pengajuanBerkas->save();

            $kelulusan = PMBKelulusanModel::create([
                "id" => strtoupper(Str::random(20)),
                "nomor_registrasi" => $request->post('nomor_registrasi'),
                "kode_prodi" => $request->post('kode_prodi'),
                'status' => 'LULUS'
            ]);

            // $dataCBT = PMBCBTModel::where(['nomor_registrasi' => $pengajuanBerkas->nomor_registrasi])->first();
            // if ($dataCBT) {
            //     $dataCBT = PMBCBTModel::create([
            //         "id" => strtoupper(Str::random(20)),
            //         "nomor_registrasi" => $pengajuanBerkas->nomor_registrasi,
            //         "status" => "Menunggu",
            //     ]);
            // }

            return redirect('/pmb/pengajuan-berkas')->with("message", "Mahasiswa berhasil dinyatakan lulus registrasi berkas!");
        }

        return redirect('/pmb/pengajuan-berkas')->with("error-message", "Pengajuan berkas tidak ditemukan!");
    }

    // public function lulus($pengajuanBerkasId)
    // {

    //     $berkas = PMBBerkasModel::where(['pmb_pengajuan_berkas_id' => $pengajuanBerkasId])->get();

    //     foreach ($berkas as $key => $value) {
    //         if ($berkas[$key]['status'] == "Review" || $berkas[$key]['status'] == "Reject") {
    //             return redirect('/pmb/pengajuan-berkas')->with("error-message", "Berkas belum lengkap");
    //         }
    //     }

    //     $pengajuanBerkas = PMBPengajuanBerkasModel::find($pengajuanBerkasId);
    //     if ($pengajuanBerkas) {
    //         $pengajuanBerkas->status = "Verified";
    //         $pengajuanBerkas->save();

    //         $dataCBT = PMBCBTModel::where(['pmb_registrasi_id' => $pengajuanBerkas->pmb_registrasi_id])->first();
    //         if ($dataCBT) {
    //             $dataCBT = PMBCBTModel::create([
    //                 "id" => strtoupper(Str::random(20)),
    //                 "pmb_registrasi_id" => $pengajuanBerkas->pmb_registrasi_id,
    //                 "status" => "Menunggu",
    //             ]);
    //         }

    //         return redirect('/pmb/pengajuan-berkas')->with("message", "Mahasiswa berhasil dinyatakan lulus registrasi berkas!");
    //     }

    //     return redirect('/pmb/pengajuan-berkas')->with("error-message", "Pengajuan berkas tidak ditemukan!");
    // }

    public function accept_berkas($berkasId)
    {

        $berkas = PMBBerkasModel::find($berkasId);
        if ($berkas) {
            $berkas->status = "Accept";
            $berkas->save();
            return redirect("/pmb/pengajuan-berkas/detail/$berkas->pmb_pengajuan_berkas_id")->with("message", "Berkas berhasil diterima!");
        }
        return redirect("/pmb/pengajuan-berkas/detail/$berkas->pmb_pengajuan_berkas_id")->with('error-message', "Gagal terima pengajuan berkas!");
    }

    public function reject_berkas(Request $request)
    {
        $berkas = PMBBerkasModel::find($request->post('berkas_id'));

        if ($berkas) {
            $berkas->message = $request->post('message');
            $berkas->status = "Reject";
            $berkas->save();
            return redirect("/pmb/pengajuan-berkas/detail/$berkas->pmb_pengajuan_berkas_id")->with('message', "Berhasil reject berkas");
        }

        return redirect("/pmb/pengajuan-berkas/detail/$berkas->pmb_pengajuan_berkas_id")->with('error-message', "Gagal reject berkas");
    }
}
