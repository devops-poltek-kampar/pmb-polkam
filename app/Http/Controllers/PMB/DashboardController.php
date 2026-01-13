<?php

namespace App\Http\Controllers\PMB;

use App\Http\Controllers\Controller;
use App\Models\PMBGelombangModel;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {

        $gelombang = PMBGelombangModel::withCount('registrasi')->where(['status' => "OPEN"])->first();
        // return response()->json(compact('gelombang'));
        return view('pmb.dashboard', compact('gelombang'));
    }
}
