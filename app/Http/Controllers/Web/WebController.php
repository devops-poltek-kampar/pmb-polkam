<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\PMBBeranda;
use App\Models\PMBBeritaModel;
use App\Models\PMBGelombangModel;
use App\Models\PMBTutorial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class WebController extends Controller
{
    public function index()
    {
        $beranda = PMBBeranda::first();

        return view('website.index', compact('beranda'));
    }

    public function beranda()
    {

        $beranda = PMBBeranda::first();
        return view('pmb.master-web.beranda.index', compact('beranda'));
    }

    public function unduh_berkas(Request $request)
    {
        return view('website.unduh-berkas');
    }

    public function edit_tutorial(Request $request)
    {
        $dataTutorial = $request->validate(['link' => 'required'], ['link.required' => "Link wajib diisi!"]);

        $tutorial = PMBTutorial::first();

        if ($tutorial) {
            $tutorial->link = $dataTutorial['link'];
            $tutorial->save();

            return back()->with('success', 'Berhasil edit halaman tutorial!');
        }
        return back()->with('failed', "Data tidak ditemukan!");
    }

    public function admin_tutorial()
    {
        $tutorial = PMBTutorial::first();
        return view('pmb.master-web.tutorial.index', compact('tutorial'));
    }

    public function profile()
    {
        return view('website.profile');
    }

    public function info_pmb()
    {
        return view('website.info-pmb');
    }

    public function tutorial()
    {
        $tutorial = PMBTutorial::first();
        return view('website.tutorial', compact('tutorial'));
    }

    public function edit_beranda(Request $request)
    {

        $request->validate([
            'banner_path' => ['mimes:jpg,jpeg,png'],
            'path_img1' => ['mimes:jpg,jpeg,png'],
            'path_img2' => ['mimes:jpg,jpeg,png'],
            'path_img3' => ['mimes:jpg,jpeg,png'],
        ]);

        $beranda = PMBBeranda::first();

        if ($beranda) {

            $beranda->link_video = $request->post('link_video');


            if ($request->hasFile("banner_path")) {

                if (Storage::delete($beranda->banner_path)) {
                    $beranda->banner_path = $request->file('banner_path')->store('web/beranda');
                }
            }

            if ($request->hasFile("path_img1")) {

                if (Storage::delete($beranda->path_img1)) {
                    $beranda->path_img1 = $request->file('path_img1')->store('web/beranda');
                }
            }

            if ($request->hasFile("path_img2")) {

                if (Storage::delete($beranda->path_img2)) {
                    $beranda->path_img2 = $request->file('path_img2')->store('web/beranda');
                }
            }

            if ($request->hasFile("path_img3")) {

                if (Storage::delete($beranda->path_img3)) {
                    $beranda->path_img3 = $request->file('path_img3')->store('web/beranda');
                }
            }

            $beranda->save();

            return back()->with('success', "Berhasil edit beranda!");
        }

        return back()->with("failed", "Data tidak ditemukan!");
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
        $berita = PMBBeritaModel::limit(4)->orderBy('created_at', 'DESC')->get();
        // return response()->json($berita);
        return view('website.berita', compact('berita'));
    }

    public function detail_berita($slug)
    {
        $berita = PMBBeritaModel::where(['slug' => $slug])->first();
        return view('website.detail-berita', compact('berita'));
    }
}
