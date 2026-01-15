<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PMBBerkasPernyataanModel extends Model
{
    protected $table = "pmb_berkas_pernyataan";
    protected $keyType = "string";
    protected $primaryKey = 'id';
    public $incrementing = false;
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

    public function file_pernyataan(): HasMany
    {
        return $this->hasMany(PMBFileBerkasPernyataanModel::class, 'pmb_berkas_pernyataan_id', 'id');
    }
}
