<?php

namespace App\Http\Controllers\PMB;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormDokumenRequest;
use App\Http\Requests\GelombangRequest;
use App\Models\PMBGelombangModel;
use App\Models\PMBJalurModel;
use App\Models\PMBJalurMasukModel;
use App\Services\SystemSettingService;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SystemSettingController extends Controller
{
    private SystemSettingService $systemSettingService;

    public function __construct(SystemSettingService $systemSettingService)
    {
        $this->systemSettingService = $systemSettingService;
    }
    public function gelombang()
    {
        // $dataGelombang = $this->systemSettingService->getGelombang();
        $dataGelombang = PMBGelombangModel::all();
        return view('pmb.data-master.gelombang.index', compact("dataGelombang"));
    }

    public function jalur_gelombang($gelombangId)
    {
        $dataJalur = PMBGelombangModel::with(['jalur_masuk' => function ($queryJalurMasuk) {
            return $queryJalurMasuk->with(['jalur']);
        }])->where("id", $gelombangId)->get(['id', 'nama', 'tahun'])->first();
        // return response()->json(compact('dataJalur'));
        return view('pmb.data-master.gelombang.jalur-gelombang', compact('dataJalur'));
    }

    public function dokumen_jalur($jalurId)
    {

        $jalur = $this->systemSettingService->getDokumenJalurById($jalurId);
        return view('pmb.data-master.jalur.dokumen', compact("jalur"));
    }

    public function form_tambah_dokumen_jalur($jalurId)
    {
        return view('');
    }



    public function form_dokumen_jalur($jalurId)
    {
        $jalur = $this->systemSettingService->getJalurById($jalurId);
        // return response()->json($jalur);
        return view('pmb.data-master.dokumen-jalur.tambah', compact('jalur'));
    }

    



    // public function create_dokumen(FormDokumenRequest $request)
    // {
    //     $dataDokumen = $request->except('_token');
    //     $dataDokumen['id'] = strtoupper(Str::random(20));
    //     $dataDokumen['name_attribute'] = strtolower(Str::replace(" ", "_", $request->post('nama')));
    //     $resultStoreDokumen = $this->systemSettingService->storeDokumen($dataDokumen);
    //     if ($resultStoreDokumen['status'] == 201) {
    //         return redirect($resultStoreDokumen['path'])->with("message", $resultStoreDokumen['message']);
    //     }

    //     return back()->with('error-message', $resultStoreDokumen['message']);
    // }

    

    
}
