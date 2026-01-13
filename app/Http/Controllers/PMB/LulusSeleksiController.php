<?php

namespace App\Http\Controllers\PMB;

use App\DataTables\KelulusanDataTable;
use App\Http\Controllers\Controller;
use App\Models\PMBKelulusanModel;
use Illuminate\Http\Request;

class LulusSeleksiController extends Controller
{
    public function index(KelulusanDataTable $dataTable)
    {
        // $data = PMBKelulusanModel::with(['registrasi' => function ($queryRegistrasi) {
        //     return $queryRegistrasi->with(['jalur_masuk' => function ($queryJalurMasuk) {
        //         return $queryJalurMasuk->with(['gelombang' => function ($queryGelombang) {
        //             return $queryGelombang->select(['id', 'nama', 'tahun']);
        //         }, 'jalur' => function ($queryJalur) {
        //             return $queryJalur->select(['id', 'nama']);
        //         }])->select(['id', 'pmb_gelombang_id', 'pmb_jalur_id']);
        //     }])->select(['id', 'nomor_registrasi', 'nama', 'pmb_jalur_masuk_id']);
        // }, 'prodi' => function ($queryProdi) {
        //     return $queryProdi->select(['id', 'kode_prodi', 'nama', 'jenjang']);
        // }])->select()->first();
        // return response()->json($data);
        return $dataTable->render("pmb.lulus-seleksi.index");
        // return view('pmb.lulus-seleksi.index');
    }
}
