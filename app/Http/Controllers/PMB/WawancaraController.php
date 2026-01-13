<?php

namespace App\Http\Controllers\PMB;

use App\DataTables\WawancaraDataTables;
use App\Http\Controllers\Controller;
use App\Mail\LulusWawancaraMail;
use App\Models\PMBWawancaraModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class WawancaraController extends Controller
{
    public function index(WawancaraDataTables $dataTable)
    {
        return $dataTable->render("pmb.wawancara.index");
    }

    public function lulus($wawancaraId)
    {
        $wawancara = PMBWawancaraModel::with(['registrasi' => function ($queryRegistrasi) {
            return $queryRegistrasi->with(['users' => function ($queryUsers) {
                return $queryUsers->select(['id', 'username', 'email']);
            }])->select(['id', 'pmb_users_id', 'nomor_registrasi', 'nama']);
        }])->where(["id" => $wawancaraId])->get(['id', 'nomor_registrasi', 'status'])->first();
        // return response()->json($wawancara);
        if ($wawancara) {
            if ($wawancara->status == "Lulus") {
                return back()->with('message', 'Sudah diverifikasi!');
            }

            $wawancara->status = "Lulus";
            if ($wawancara->save()) {
                Mail::to($wawancara->registrasi->users->email)->send(new LulusWawancaraMail($wawancara));
            }
            return back()->with("message", "Berhasil lulus wawancara");
        }

        return back()->with("error-message", "Gagal lulus wawancara");
    }
}
