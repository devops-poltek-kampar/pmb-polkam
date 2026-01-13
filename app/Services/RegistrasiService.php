<?php

namespace App\Services;

use App\Repositories\RegistrasiRepository;

class RegistrasiService
{
    private RegistrasiRepository $registrasiRepository;

    public function __construct(RegistrasiRepository $registrasiRepository)
    {
        $this->registrasiRepository = $registrasiRepository;
    }

    public function allRegistrasi()
    {
        return $this->registrasiRepository->allRegistrasi();
    }

    public function storeDataFormRegistrasi($dataFormRegistrasi)
    {
        $dataRegistrasi = $dataFormRegistrasi->except(['pas_foto', "ktp", "surat_keterangan_tidak_mampu", "kartu_keluarga"]);
        $fileLampiranRegistrasi = $dataFormRegistrasi->only(['pas_foto', "ktp", "surat_keterangan_tidak_mampu", "kartu_keluarga"]);
        $resultStoreFormRegistrasi = $this->registrasiRepository->storeDataFormRegistrasi($dataRegistrasi, $fileLampiranRegistrasi);
        if ($resultStoreFormRegistrasi) {
            return ['status' => 201, "path" => "/user/data-registrasi", "message" => "Berhasil simpan data"];
        }
        return ["status" => 403, "path" => "/user/form-registrasi", "error-message" => "Gagal simpan data!"];
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
            return ['status' => 201, "message" => "Berhasil update data registrasi $nomorRegistrasi", "path" => "/keuangan/data-pembayaran"];
        }
        return ['status' => 403, "message" => "Gagal update data!", "path" => "/keuangan/data-pembayaran"];
    }

    public function setRulesValidasi($jalur)
    {
        $rules = $jalur->mapWithKeys(function ($item) {

            if ($item['sifat'] == "not required") return [
                $item['name_attribute'] => [
                    'mimes:' . $item['tipe'],
                ],
            ];

            return [
                $item['name_attribute'] => [
                    $item['sifat'],
                    'mimes:' . $item['tipe'],
                ],
            ];
        })->toArray();

        $message = $jalur->mapWithKeys(function ($item) {
            return [
                $item['name_attribute'] . "." . $item['sifat'] => str_replace('_', ' ', $item['name_attribute']) . " mohon penuhi"
            ];
        })->toArray();
        return ["rules" => $rules, 'message' => $message];
    }
}
