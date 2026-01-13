<?php

namespace App\Repositories\PMBRepositories;

use App\Models\PMBBuktiPembayaranModel;
use App\Models\PMBLampiranRegistrasiModel;
use App\Models\PMBRegistrasiModel;
use Exception;
use Illuminate\Support\Facades\DB;

class RegistrasiRepository
{
    public function storeDataFormRegistrasi($dataRegistrasi, $fileLampiranRegistrasi)
    {
        $registrasi = PMBRegistrasiModel::create($dataRegistrasi->toArray());
        foreach ($fileLampiranRegistrasi as $key => $value) {
            $registrasi->lampiran()->create([
                "pmb_registrasi_id" => $registrasi->id,
                "nama" => $fileLampiranRegistrasi[$key]['filename'],
                "path" => $fileLampiranRegistrasi[$key]['path'],
                "status" => "Review",
                "kategori" => $key
            ]);
        }
        return $registrasi;
    }

    public function getRegistrasiById($id)
    {
        return PMBRegistrasiModel::with(['users', 'lampiran'])->where(['id' => $id])->first();
    }
    public function getRegistrasiByUserId($userId)
    {
        return PMBRegistrasiModel::with(['users'])->where(['pmb_users_id' => $userId])->get();
    }
    public function getRegistrasiByNomorRegistrasi($nomorRegistrasi)
    {
        return PMBRegistrasiModel::with(['bukti_pembayaran' => function ($query) {
            return $query->where('status', "Pending");
        }])->where(['nomor_registrasi' => $nomorRegistrasi])->first();
    }

    public function storeBuktiPembayaran($dataBuktiPembayaran)
    {
        $resultStore = PMBBuktiPembayaranModel::create($dataBuktiPembayaran);
        if ($resultStore) {
            PMBRegistrasiModel::where("nomor_registrasi", $dataBuktiPembayaran['pmb_registrasi_nomor_registrasi'])->update(['status_bayar_registrasi' => "Pending"]);
        }
        return $resultStore;
    }

    public function getRegistrasiWithStructRegis()
    {
        return PMBRegistrasiModel::with(['bukti_pembayaran'])->get();
        // return PMBRegistrasiModel::with(['bukti_pembayaran' => function ($query) {
        //     return $query->where(['status' => "Pending"]);
        // }])->get();
    }

    public function setStatusRegistrasiRepository($dataStatusRegistrasi)
    {
        DB::transaction(function () use ($dataStatusRegistrasi) {

            $resultUpdateRegistrasi = PMBRegistrasiModel::where(['nomor_registrasi' => $dataStatusRegistrasi['nomor_registrasi']])->update(["status_bayar_registrasi" => $dataStatusRegistrasi['status_bayar_registrasi']]);
            $resultUpdateBuktiPembayaran = PMBBuktiPembayaranModel::where(['pmb_registrasi_nomor_registrasi' => $dataStatusRegistrasi['nomor_registrasi']])->update(['status' => $dataStatusRegistrasi['status']]);

            if ($resultUpdateRegistrasi == 0 || $resultUpdateBuktiPembayaran == 0) {
                throw new Exception("Ada query yang gagal!");
            }
        });
        return true;
    }
}
