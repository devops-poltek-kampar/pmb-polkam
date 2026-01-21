<?php

namespace App\Http\Controllers\PMB;

use App\Http\Controllers\Controller;
use App\Models\PMBJalurModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class JalurController extends Controller
{

    public function jalur()
    {
        // $dataJalur = $this->systemSettingService->getJalur();
        $dataJalur = PMBJalurModel::lazy();
        return view('pmb.data-master.jalur.index', compact('dataJalur'));
    }

    public function form_tambah_jalur()
    {
        // $gelombang = $this->systemSettingService->getGelombangById($id);
        // $jalur = PMBJalurModel::all();
        return view('pmb.data-master.jalur.tambah');
    }

    public function create_jalur(Request $request)
    {
        $dataJalur = $request->validate([
            'nama' => ['required']
        ], ["nama.required" => "Mohon isi nama jalur!"]);
        $dataJalur['id'] = strtoupper(Str::random(20));
        $resultStoreJalur = PMBJalurModel::create($dataJalur);
        if ($resultStoreJalur) {
            return redirect('/pmb/jalur')->with('message', "Berhasil simpan data jalur!");
        }
        return back()->with('message', "Gagal simpan data jalur");
    }
}
