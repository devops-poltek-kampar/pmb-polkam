<?php

namespace App\Services\PMBServices;

use App\Repositories\PMBRepositories\RegistrasiRepository;

class RegistrasiService
{
    private RegistrasiRepository $registrasiRepository;

    public function __construct(RegistrasiRepository $registrasiRepository)
    {
        $this->registrasiRepository = $registrasiRepository;
    }

    public function getRegistrasiById($id)
    {
        return $this->registrasiRepository->getRegistrasiById($id);
    }

    public function getRegistrasiByUserId($userId)
    {
        return $this->registrasiRepository->getRegistrasiByUserId($userId);
    }
    public function getRegistrasiByNomorRegistrasi($nomorRegistrasi)
    {
        return $this->registrasiRepository->getRegistrasiByNomorRegistrasi($nomorRegistrasi);
    }

    public function storeBuktiPembayaranRegistrasi($dataBuktiPembayaran)
    {
        $resultStore = $this->registrasiRepository->storeBuktiPembayaran($dataBuktiPembayaran);

        if ($resultStore) {
            return ['status' => 201, "message" => "Berhasil simpan data", "path" => "/user/data-registrasi"];
        }

        return ['status' => 403, "message" => "Gagal simpan data", "path" => "/user/data-registrasi"];
    }

    public function getRegistrasiWithStructRegis()
    {
        return $this->registrasiRepository->getRegistrasiWithStructRegis();
    }

    public function setStatusRegistrasi($nomorRegistrasi, $status)
    {
        $statusBayarRegistrasi = match ($status) {
            "Accept" => "Done",
            "Reject" => "Reject",
            default => "Pending"
        };

        $dataStatusRegistrasi = ['nomor_registrasi' => $nomorRegistrasi, "status" => $status, "status_bayar_registrasi" => $statusBayarRegistrasi];
        $result = $this->registrasiRepository->setStatusRegistrasiRepository($dataStatusRegistrasi);
        if ($result) {
            return ['status' => 201, "message" => "Berhasil update data registrasi $nomorRegistrasi", "path" => "/keuangan/data-registrasi"];
        }
        return ['status' => 403, "message" => "Gagal update data!", "path" => "/keuangan/data-registrasi"];
    }
}
