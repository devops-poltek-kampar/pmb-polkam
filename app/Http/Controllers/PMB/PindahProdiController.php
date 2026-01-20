<?php

namespace App\Http\Controllers\PMB;

use App\DataTables\PindahProdiDataTable;
use App\Http\Controllers\Controller;
use App\Models\MasterProgramStudiModel;
use Illuminate\Http\Request;

class PindahProdiController extends Controller
{
    public function index(PindahProdiDataTable $dataTable)
    {
        $prodi = MasterProgramStudiModel::select(['kode_prodi', 'nama'])->lazy();
        return $dataTable->render('pmb.pindah-prodi.index', compact('prodi'));
    }
}
