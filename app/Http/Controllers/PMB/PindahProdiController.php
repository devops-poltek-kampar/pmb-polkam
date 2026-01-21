<?php

namespace App\Http\Controllers\PMB;

use App\DataTables\PindahProdiDataTable;
use App\Http\Controllers\Controller;
use App\Models\MasterProgramStudiModel;
use App\Models\PMBKelulusanModel;
use Illuminate\Http\Request;

class PindahProdiController extends Controller
{
    public function index(PindahProdiDataTable $dataTable)
    {
        $prodi = MasterProgramStudiModel::select(['kode_prodi', 'nama'])->lazy();
        return $dataTable->render('pmb.pindah-prodi.index', compact('prodi'));
    }

    public function pindah_prodi(Request $request)
    {
        $dataValid = $request->validate(['pmb_kelulusan_id' => ['required'], 'kode_prodi' => ['required']]);
        $kelulusan = PMBKelulusanModel::find($dataValid['pmb_kelulusan_id']);
        if ($kelulusan) {
            $kelulusan->kode_prodi = $dataValid['kode_prodi'];
            $kelulusan->save();
            return redirect('/pmb/pindah-prodi')->with('success', 'Berhasil pindah prodi!');
        }
        return back()->with('failed', "Data tidak ditemukan!");
    }
}
