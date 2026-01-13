<?php

namespace App\Http\Controllers\PMB;

use App\DataTables\PMBBerkasPernyataanModelDataTable;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BerkasPernyataanController extends Controller
{
    public function index(PMBBerkasPernyataanModelDataTable $dataTable)
    {
        return $dataTable->render('pmb.berkas-pernyataan.index');
    }
}
