<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PMBRegistrasiModel extends Model
{
    protected $table = "pmb_registrasi";
    protected $keyType = 'string';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = [
        'id',
        "pmb_users_id",
        "nomor_registrasi",
        "nama",
        "tempat_lahir",
        "tanggal_lahir",
        "jenis_kelamin",
        "alamat",
        "asal_kecamatan",
        "rt",
        "rw",
        "provinsi",
        "kode_pos",
        "hp_ortu",
        "hp_mahasiswa",
        "no_wa",
        "agama",
        "status_nikah",
        "asal_sekolah",
        "jurusan",
        "pernyataan_serah_data",
        "pernyataan_data_valid",
        "sumber_info_daftar",
        "sumber_info",
        "prodi_pilihan_1",
        "prodi_pilihan_2",
        "pmb_jalur_masuk_id",
        "pembiayaan",
        "status_bayar_registrasi"
    ];

    public function lampiran(): HasMany
    {
        return $this->hasMany(PMBDokumenRegistrasiModel::class, "pmb_registrasi_id", "id");
    }

    public function prodi_1(): HasOne
    {
        return $this->hasOne(MasterProgramStudiModel::class, "kode_prodi", "prodi_pilihan_1");
    }

    public function prodi_2(): HasOne
    {
        return $this->hasOne(MasterProgramStudiModel::class, "kode_prodi", "prodi_pilihan_2");
    }

    public function users(): HasOne
    {
        return $this->hasOne(PMBUsersModel::class, "id", "pmb_users_id");
    }

    public function bukti_pembayaran(): HasMany
    {
        return $this->hasMany(PMBBuktiPembayaranModel::class, "pmb_registrasi_nomor_registrasi", "nomor_registrasi");
    }

    public function jalur_masuk(): HasOne
    {
        return $this->hasOne(PMBJalurMasukModel::class, "id", "pmb_jalur_masuk_id");
    }
}
