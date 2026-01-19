<?php

namespace App\Http\Controllers\Maba;

use App\Http\Controllers\Controller;
use App\Models\PMBGelombangModel;
use App\Models\PMBRegistrasiModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $gelombang = PMBGelombangModel::with(['jalur_masuk' => function ($queryJalurMasuk) {
            return $queryJalurMasuk->with(['jalur' => function ($queryJalur) {
                $queryJalur->select(['id', 'nama']);
            }])->select(['id', 'pmb_gelombang_id', 'pmb_jalur_id', 'biaya_registrasi', 'keterangan']);
        }])->where(['status' => 'Open'])->select(['id', 'nama', 'tahun', 'open', 'close'])->first();
        $registrasi = PMBRegistrasiModel::where(['pmb_users_id' => session('id')])->get(['id', 'pmb_users_id', 'created_at'])->first();

        return view('maba.dashboard', compact('gelombang', 'registrasi'));
    }
}
