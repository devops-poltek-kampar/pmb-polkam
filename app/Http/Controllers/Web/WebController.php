<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\PMBBeritaModel;
use App\Models\PMBGelombangModel;
use App\Models\PMBJalurMasukModel;
use Illuminate\Http\Request;

class WebController extends Controller
{
    public function index()
    {
        // return view('email.forgot-password');
        // return view('email.pembayaran-registrasi-ulang');

        return view('website.index');
    }

    public function profile()
    {
        return view('website.profile');
    }
    public function info_pmb()
    {
        return view('website.info-pmb');
    }

    public function jadwal_biaya()
    {

        $gelombang = PMBGelombangModel::with(['jalur_masuk' => function ($queryJalurMasuk) {
            return $queryJalurMasuk->with(['jalur' => function ($queryJalur) {
                return $queryJalur->select(['id', "nama as nama_jalur"]);
            }, 'gelombang' => function ($queryGelombang) {
                return $queryGelombang->select(['id', 'nama', 'tahun']);
            }])->select(["id", 'pmb_gelombang_id', 'pmb_jalur_id']);
        }])->where(['status' => "OPEN"])->get(['id', 'nama', 'tahun', 'open', 'close'])->first();
        // return response()->json($gelombang);

        return view('website.jadwal-biaya', compact('gelombang'));
    }
    public function berita()
    {
        $berita = PMBBeritaModel::all();
        return view('website.berita', compact('berita'));
    }

    public function detail_berita($slug)
    {
        $berita = PMBBeritaModel::where(['slug' => $slug])->first();
        return view('website.detail-berita', compact('berita'));
    }
}
