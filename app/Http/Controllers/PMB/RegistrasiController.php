<?php

namespace App\Http\Controllers\PMB;

use App\DataTables\DataRegistrasiDataTable;
use App\Http\Controllers\Controller;
use App\Models\PMBCBTModel;
use App\Models\PMBPengajuanBerkasModel;
use App\Models\PMBRegistrasiModel;
use App\Services\RegistrasiService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RegistrasiController extends Controller
{
    private RegistrasiService $registrasiService;
    public function __construct(RegistrasiService $registrasiService)
    {
        $this->registrasiService = $registrasiService;
    }
}
