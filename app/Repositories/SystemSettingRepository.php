<?php

namespace App\Repositories;

use App\Models\PMBDokumenJalurModel;
use App\Models\PMBGelombangModel;
use App\Models\PMBJalurMasukModel;

class SystemSettingRepository
{
    public function getGelombangPendaftaran()
    {
        return PMBGelombangModel::all();
    }

    public function getJalurMasuk()
    {
        return PMBJalurMasukModel::with(['gelombang'])->get();
    }

    public function getGelombangWithByIdJalurMasuk($gelombangId)
    {
        return PMBGelombangModel::with(['jalur'])->where("id", $gelombangId)->get(['id', 'nama', 'tahun'])->first();
    }

    public function getGelombangById($id)
    {
        return PMBGelombangModel::find($id);
    }

    public function storeGelombang(array $dataGelombang)
    {
        return PMBGelombangModel::create($dataGelombang);
    }

    public function storeJalur(array $dataGelombang)
    {
        return PMBJalurMasukModel::create($dataGelombang);
    }

    public function storeDokumen(array $dataDokumen)
    {
        return PMBDokumenJalurModel::create($dataDokumen);
    }

    public function getDokumenJalurById($jalurId)
    {
        return PMBJalurMasukModel::with(['dokumen', 'gelombang'])->where("id", $jalurId)->first();
    }

    public function getJalurById($jalurId)
    {
        return PMBJalurMasukModel::with(['gelombang'])->where("id", $jalurId)->get()->first();
    }
}
