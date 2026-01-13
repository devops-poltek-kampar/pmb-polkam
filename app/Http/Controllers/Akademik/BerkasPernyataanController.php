<?php

namespace App\Http\Controllers\Akademik;

use App\DataTables\BerkasPernyataanDataTable;
use App\Http\Controllers\Controller;
use App\Models\PMBBerkasPernyataanModel;
use App\Models\PMBRegistrasiModel;
use Illuminate\Http\Request;

class BerkasPernyataanController extends Controller
{
    public function index(BerkasPernyataanDataTable $dataTable)
    {
        return $dataTable->render('akademik.berkas-pernyataan.index');
    }

    public function approve_berkas($status, $berkasPernyataanId)
    {
        $berkasPernyataan = PMBBerkasPernyataanModel::find($berkasPernyataanId);
        if ($berkasPernyataan) {
            $berkasPernyataan->status = $status;
            $berkasPernyataan->save();
            return redirect('/akademik/berkas-pernyataan')->with('message', "Berhasil $status berkas pernyataan!");
        }
        return redirect('/akademik/berkas-pernyataan')->with('failed', "Berkas tidak ditemukan");
    }
}
