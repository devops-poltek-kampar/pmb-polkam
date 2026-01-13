<?php

namespace App\Http\Controllers\PMB;

use App\Http\Controllers\Controller;
use App\Http\Requests\FormDokumenRequest;
use App\Models\MasterProgramStudiModel;
use App\Models\PMBDokumenJalurModel;
use App\Models\PMBGelombangModel;
use App\Models\PMBJalurMasukModel;
use App\Models\PMBJalurMasukProdiModel;
use App\Models\PMBJalurModel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PortalRegistrasiController extends Controller
{
    public function index()
    {
        $portalRegistrasi = PMBJalurMasukModel::with(['jalur', 'gelombang'])->get();
        // return response()->json($portalRegistrasi); 
        return view('pmb.data-master.portal-registrasi.index', compact('portalRegistrasi'));
    }

    public function create_portal(Request $request)
    {
        $dataValid = $request->validate(['biaya_registrasi' => ['required', 'numeric'], 'pmb_gelombang_id' => ['required'], "pmb_jalur_id" => ['required'], 'keterangan' => ['required']]);
        // return response()->json($dataValid);
        $dataValid['id'] = strtoupper(Str::random(20));
        $dataValid['status'] = "Close";

        $resultStore = PMBJalurMasukModel::create($dataValid);

        if ($resultStore) {
            return redirect('/pmb/portal-registrasi')->with('message', "Berhasil tambah portal!");
        }

        return back()->with("error-message", "Gagal tambah portal!");
    }

    public function form_tambah_portal()
    {
        $gelombang = PMBGelombangModel::all();
        $jalur = PMBJalurModel::all();
        return view('pmb.data-master.portal-registrasi.tambah', compact('gelombang', 'jalur'));
    }

    public function dokumen_jalur($jalurMasukId)
    {
        $jalurMasuk = PMBJalurMasukModel::with(['dokumen', 'gelombang' => function ($queryGelombang) {
            return $queryGelombang->select(['id', 'nama', 'tahun', 'open', 'close']);
        }, 'jalur' => function ($queryJalur) {
            return $queryJalur->select(['id', 'nama']);
        }])->where(['id' => $jalurMasukId])->first();
        // return response()->json($jalurMasuk);
        return view('pmb.data-master.portal-registrasi.dokumen-jalur', compact('jalurMasuk'));
    }

    public function create_dokumen(FormDokumenRequest $request)
    {
        $dataDokumen = $request->except('_token');
        $dataDokumen['id'] = strtoupper(Str::random(20));
        $dataDokumen['name_attribute'] = strtolower(Str::replace(" ", "_", $request->post('nama')));
        $resultStoreDokumen = PMBDokumenJalurModel::create($dataDokumen); //$this->systemSettingService->storeDokumen($dataDokumen);
        if ($resultStoreDokumen) {
            return back()->with('message', "Berhasil simpan data dokumen!");
        }

        return back()->with('error-message', "Gagal simpan data dokumen!");
    }

    public function create_prodi_jalur(Request $request)
    {

        $dataProdi = $request->validate([
            'master_program_studi_id' => ['required'],
            "pmb_jalur_masuk_id" => ['required'],

        ]);

        $dataProdi['id'] = strtoupper(Str::random(20));

        $resultStore = PMBJalurMasukProdiModel::create($dataProdi);

        if ($resultStore) {
            return back()->with('message', 'Berhasil simpan data prodi!');
        }

        return back()->with('error-message', "Gagal simpan data prodi!");
    }

    public function program_studi($jalurMasukId)
    {
        // $programStudiJalur = PMBJalurMasukProdiModel::with(['prodi'])->where(['pmb_jalur_masuk_id' => $jalurMasukId])->get();
        $programStudiJalur = PMBJalurMasukModel::with(['program_studi' => function ($queryProgramStudi) {
            return $queryProgramStudi->with(['prodi' => function ($queryProdi) {
                return $queryProdi->select(['id', 'kode_prodi', 'nama']);
            }]);
        }, 'jalur' => function ($queryJalur) {
            return $queryJalur->select(['id', 'nama']);
        }, 'gelombang' => function ($queryGelombang) {
            return $queryGelombang->select(['id', 'nama', 'tahun']);
        }])->where(['id' => $jalurMasukId])->select(['id', 'pmb_gelombang_id', 'pmb_jalur_id', 'biaya_registrasi', 'keterangan'])->first();
        // return response()->json($programStudiJalur);
        $prodi = MasterProgramStudiModel::all(['id', 'kode_prodi', 'nama']);
        return view('pmb.data-master.portal-registrasi.prodi-jalur', compact('programStudiJalur', 'prodi'));
    }
}
