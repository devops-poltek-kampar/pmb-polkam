<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PMBKelulusanModel extends Model
{
    protected $table = "pmb_kelulusan";
    protected $keyType = "string";
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        "nomor_registrasi",
        "kode_prodi",
        "created_at",
        "updated_at"
    ];

    public function prodi(): HasOne
    {
        return $this->hasOne(MasterProgramStudiModel::class, "kode_prodi", 'kode_prodi');
    }

    public function registrasi(): HasOne
    {
        return $this->hasOne(PMBRegistrasiModel::class, "nomor_registrasi", 'nomor_registrasi');
    }
}
