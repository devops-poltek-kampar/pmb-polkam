<?php

namespace App\Http\Controllers\Maba;

use App\Http\Controllers\Controller;
use App\Models\PMBKelulusanModel;
use App\Models\PMBRegistrasiModel;
use Illuminate\Http\Request;

class PengumumanController extends Controller
{
    public function index()
    {

        $registrasi = PMBRegistrasiModel::where(['pmb_users_id' => session('id')])->get(['pmb_users_id', 'nama', 'nomor_registrasi', "pmb_jalur_masuk_id"])->first();

        if (!$registrasi) {
            return redirect('/user/dashboard')->with("message", 'silahkan melakukan seluruh tahap registrasi terlebih dahulu');
        }
        $kelulusan = PMBKelulusanModel::with(['prodi' => function ($queryProdi) {
            return $queryProdi->select('kode_prodi', 'nama');
        }])
            ->where(['nomor_registrasi' => $registrasi->nomor_registrasi])
            ->get(['id', 'nomor_registrasi', 'status', 'status', 'kode_prodi'])
            ->first();



        // return response()->json($kelulusan);

        return view('maba.pengumuman.index', compact('registrasi', 'kelulusan'));
    }
}
