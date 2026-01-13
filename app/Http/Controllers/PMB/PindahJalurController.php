<?php

namespace App\Http\Controllers\PMB;

use App\DataTables\PindahJalurDataTable;
use App\Http\Controllers\Controller;
use App\Models\PMBPengajuanBerkasModel;
use App\Models\PMBRegistrasiModel;
use Illuminate\Http\Request;

class PindahJalurController extends Controller
{

    public function index(PindahJalurDataTable $dataTable)
    {
        // $data = PMBRegistrasiModel::with(['jalur_masuk' => function ($queryJalurMasuk) {
        //     return $queryJalurMasuk->with(['jalur' => function ($queryJalur) {
        //         return $queryJalur->select(['id', 'nama']);
        //     }, 'gelombang' => function ($queryGelombang) {
        //         return $queryGelombang->select(['id', 'nama']);
        //     }])->select(['id', 'pmb_gelombang_id', 'pmb_jalur_id']);
        // }, 'prodi_pilihan_1' => function ($queryProdiPilihan1) {
        //     return $queryProdiPilihan1->select(['kode_prodi', 'nama']);
        // }, 'prodi_pilihan_2' => function ($queryProdiPilihan2) {
        //     return $queryProdiPilihan2->select(['kode_prodi', 'nama']);
        // }])->select(['id', 'nama', 'nomor_registrasi', "pmb_jalur_masuk_id", "prodi_pilihan_1", 'prodi_pilihan_2'])->get();
        // return response()->json($data);
        return $dataTable->render("pmb.pindah-jalur.index");
    }

    public function pindah_jalur(Request $request)
    {
        $registrasi = PMBRegistrasiModel::find($request->post('nomor_registrasi'));
        $pengajuanBerkas =  PMBPengajuanBerkasModel::where(['nomor_registrasi' => $request->post('nomor_registrasi')])->first();
        if ($registrasi) {
            $registrasi->pmb_jalur_masuk_id = $request->post('pmb_jalur_masuk_id');
            // $pengajuanBerkas->pmb_jalur_masuk_id = $request->post('pmb_jalur_masuk_id');
            if ($pengajuanBerkas) {
                $pengajuanBerkas->delete();
            }
            $registrasi->save();
            return redirect('/pmb/pindah-jalur')->with('message', 'Berhasil pindah jalur');
        }

        return back()->with('failed', 'Gagal pindah jalur');
    }
}
