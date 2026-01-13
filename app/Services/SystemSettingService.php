<?php


namespace App\Services;

use App\Repositories\SystemSettingRepository;

class SystemSettingService
{
    private SystemSettingRepository $systemSettingRepository;
    public function __construct(SystemSettingRepository $systemSettingRepository)
    {
        $this->systemSettingRepository = $systemSettingRepository;
    }

    public function getGelombang()
    {
        return $this->systemSettingRepository->getGelombangPendaftaran();
    }

    public function getGelombangById($id)
    {
        return $this->systemSettingRepository->getGelombangById($id);
    }

    public function getGelombangByIdWithJalurMasuk($gelombangId)
    {
        return $this->systemSettingRepository->getGelombangWithByIdJalurMasuk($gelombangId);
    }

    public function getDokumenJalurById($jalurId)
    {
        return $this->systemSettingRepository->getDokumenJalurById($jalurId);
    }

    public function getJalur()
    {
        return $this->systemSettingRepository->getJalurMasuk();
    }

    public function getJalurById($jalurId)
    {
        return $this->systemSettingRepository->getJalurById($jalurId);
    }

    public function storeDokumen(array $dataDokumen)
    {
        $resultStore = $this->systemSettingRepository->storeDokumen($dataDokumen);

        if ($resultStore) {
            return ['status' => 201, "message" => "Berhasil tambah dokumen", "path" => "/pmb/jalur/dokumen/" . $resultStore->pmb_jalur_masuk_id];
        }

        return ['status' => 403, "message" => "Gagal tambah dokumen", "path" => "/pmb/jalur/dokumen/" . $resultStore->pmb_jalur_masuk_id];
    }

    public function storeGelombang(array $dataGelombang)
    {
        $resultStore = $this->systemSettingRepository->storeGelombang($dataGelombang);

        if ($resultStore) {
            return ['status' => 201, "message" => "Berhasil simpan data gelombang!", "path" => "/pmb/gelombang"];
        }
        return ['status' => 403, "message" => "Gagal simpan data gelombang!", "path" => "/pmb/gelombang/tambah"];
    }

    public function storeJalur(array $dataJalur)
    {
        $resultStore = $this->systemSettingRepository->storeJalur($dataJalur);

        if ($resultStore) {
            return ['status' => 201, "message" => "Berhasil simpan data gelombang!", "path" => "/pmb/gelombang"];
        }
        return ['status' => 403, "message" => "Gagal simpan data gelombang!", "path" => "/pmb/gelombang/tambah"];
    }
}
