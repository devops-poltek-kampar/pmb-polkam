<?php

namespace App\Http\Controllers\PMB;

use App\Http\Controllers\Controller;
use App\Http\Requests\GelombangRequest;
use App\Models\PMBGelombangModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class GelombangController extends Controller
{
    public function gelombang()
    {
        $dataGelombang = PMBGelombangModel::all();
        return view('pmb.data-master.gelombang.index', compact("dataGelombang"));
    }

    public function form_tambah_gelombang()
    {
        return view('pmb.data-master.gelombang.tambah');
    }

    public function create_gelombang(GelombangRequest $request)
    {
        $dataGelombang = $request->validated();
        $dataGelombang['id'] = strtoupper(Str::random(20));
        $resultStoreGelombang =  PMBGelombangModel::create($dataGelombang); //$this->systemSettingService->storeGelombang($dataGelombang);

        if ($resultStoreGelombang) {
            return redirect('/pmb/gelombang')->with("message", "Berhasil simpan data gelombang!");
        }

        return back()->with("message", "Gagal simpan data gelombang");
    }
}
