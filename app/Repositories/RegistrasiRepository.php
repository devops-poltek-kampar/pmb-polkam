<?php

namespace App\Repositories;

use App\Models\PMBBuktiPembayaranModel;
use App\Models\PMBCBTModel;
use App\Models\PMBLampiranRegistrasiModel;
use App\Models\PMBRegistrasiModel;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RegistrasiRepository
{

    public function allRegistrasi()
    {
        return PMBRegistrasiModel::all();
    }


    public function storeDataFormRegistrasi($dataRegistrasi, $fileLampiranRegistrasi)
    {
        $registrasi = PMBRegistrasiModel::create($dataRegistrasi->toArray());
        foreach ($fileLampiranRegistrasi as $key => $value) {
            $registrasi->lampiran()->create([
                "id" => strtoupper(Str::random(20)),
                "pmb_registrasi_id" => $dataRegistrasi->get('id'),
                "pmb_jalur_masuk_id" => $dataRegistrasi['pmb_jalur_masuk_id'],
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
        return PMBRegistrasiModel::with(['users' => function ($queryUsers) {
            return $queryUsers->select(['id', 'username', 'email', 'nomor_hp']);
        }, 'lampiran' => function ($queryLampiran) {
            return $queryLampiran->select(['id', 'pmb_registrasi_id', 'nama', 'path', 'status', 'kategori']);
        }, 'jalur_masuk'])->where(['id' => $id])->first();
    }

    public function getRegistrasiByUserId($userId)
    {
        return PMBRegistrasiModel::with(['users' => function ($query) {
            return $query->select(['id', 'username', 'email']);
        }])->where(['pmb_users_id' => $userId])->get(['nomor_registrasi', "pmb_jalur_masuk_id", 'nama', 'pmb_users_id', 'id', 'status_bayar_registrasi']);
    }

    public function getRegistrasiByNomorRegistrasi($nomorRegistrasi)
    {
        return PMBRegistrasiModel::with(['bukti_pembayaran' => function ($query) {
            return $query->where('kategori', "Registrasi");
        }])->where(['nomor_registrasi' => $nomorRegistrasi])->first();
        // return PMBRegistrasiModel::with(['bukti_pembayaran' => function ($query) {
        //     return $query->where('status', "Pending")->orWhere("status", "Accept");
        // }])->where(['nomor_registrasi' => $nomorRegistrasi])->first();
    }

    public function storeBuktiPembayaran($dataBuktiPembayaran)
    {
        $registrasi = PMBBuktiPembayaranModel::where(['pmb_registrasi_nomor_registrasi' => $dataBuktiPembayaran['pmb_registrasi_nomor_registrasi'], "kategori" => "Registrasi"])->first();
        if ($registrasi == null) { //jika belum ada maka buat
            $resultStore = PMBBuktiPembayaranModel::create($dataBuktiPembayaran);
            if ($resultStore) {
                PMBRegistrasiModel::where("nomor_registrasi", $dataBuktiPembayaran['pmb_registrasi_nomor_registrasi'])->update(['status_bayar_registrasi' => "Pending"]);
            }
            return $resultStore;
        }
        //jika sudah ada maka edit
        PMBRegistrasiModel::where("nomor_registrasi", $dataBuktiPembayaran['pmb_registrasi_nomor_registrasi'])->update(['status_bayar_registrasi' => "Pending"]);
        $registrasi->update(['path' => $dataBuktiPembayaran['path'], "status" => "Pending"]);
        return $registrasi;
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
            $resultUpdateBuktiPembayaran = PMBBuktiPembayaranModel::where(['pmb_registrasi_nomor_registrasi' => $dataStatusRegistrasi['nomor_registrasi'], "kategori" => "Registrasi"])->update(['status' => $dataStatusRegistrasi['status']]);
            // $resultCreateCBT = PMBCBTModel::create([
            //     "id" => strtoupper(Str::random(20)),
            //     "nomor_registrasi" => $dataStatusRegistrasi['nomor_registrasi'],
            //     "status" => "Waiting"
            // ]);
            if ($resultUpdateRegistrasi == 0 || $resultUpdateBuktiPembayaran == 0) {
                throw new Exception("Ada query yang gagal!");
            }
        });
        return true;
    }
}
