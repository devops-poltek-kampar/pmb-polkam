<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PMBPengajuanBerkasModel extends Model
{
    protected $table = "pmb_pengajuan_berkas";
    public $incrementing = false;
    protected $keyType = "string";
    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        "pmb_users_id",
        "nomor_registrasi",
        "pmb_jalur_masuk_id",
        "status",
        "created_at",
        "updated_at",
    ];

    public function berkas(): HasMany
    {
        return $this->hasMany(PMBBerkasModel::class, "pmb_pengajuan_berkas_id", "id");
    }

    public function registrasi(): HasOne
    {
        return $this->hasOne(PMBRegistrasiModel::class, "nomor_registrasi", "nomor_registrasi");
    }

    public function user(): HasOne
    {
        return $this->hasOne(PMBUsersModel::class, "id", "pmb_users_id");
    }
}
