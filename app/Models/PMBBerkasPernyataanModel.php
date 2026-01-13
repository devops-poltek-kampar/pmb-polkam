<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PMBBerkasPernyataanModel extends Model
{
    protected $table = "pmb_berkas_pernyataan";
    protected $keyType = "string";
    protected $fillable = [
        'id',
        "nomor_registrasi",
        'path',
        "status",
        'created_at',
        "updated_at"
    ];


    public function registrasi(): HasOne
    {
        return $this->hasOne(PMBRegistrasiModel::class, 'nomor_registrasi', 'nomor_registrasi');
    }
}
