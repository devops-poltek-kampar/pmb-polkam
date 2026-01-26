<?php

namespace App\Http\Controllers\PMB;

use App\DataTables\UjianCBTDataTables;
use App\Http\Controllers\Controller;
use App\Mail\UjianCBTMail;
use App\Models\PMBCBTModel;
use App\Models\PMBWawancaraModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class UjianCBTController extends Controller
{
    public function index(UjianCBTDataTables $ujianCBTDataTables)
    {
        return $ujianCBTDataTables->render("pmb.ujian-cbt.index");
    }

    public function lulus($ujianCbtId)
    {
        // $ujianCBT = PMBCBTModel::find($ujianCbtId);
        $ujianCBT = PMBCBTModel::with(['registrasi' => function ($queryRegistrasi) {
            return $queryRegistrasi->with(['users' => function ($queryUsers) {
                return $queryUsers->select(['id', 'email', 'username']);
            }])->select('id', 'pmb_users_id', 'nomor_registrasi', 'nama');
        }])->where(['id' => $ujianCbtId])->get(['id', 'nomor_registrasi', 'status'])->first();
        // return response()->json($ujianCBT);

        if ($ujianCBT) {

            if ($ujianCBT->status == "Lulus") {
                return back()->with('info', 'Sudah diverifikasi!');
            }
            $ujianCBT->status = "Lulus";
            if ($ujianCBT->save()) {

                Mail::to($ujianCBT->registrasi->users->email)->send(new UjianCBTMail($ujianCBT));

                PMBWawancaraModel::create([
                    "id" => Str::upper(Str::random(20)),
                    "nomor_registrasi" => $ujianCBT->nomor_registrasi,
                    "status" => "Menunggu"
                ]);

                return redirect('/pmb/ujian-cbt')->with('message', "Berhasil lulus ujian CBT $ujianCBT->nomor_registrasi!");
            }
        }

        return redirect('/pmb/ujian-cbt')->with('error-message', "Gagal ubah data!");
    }
}
