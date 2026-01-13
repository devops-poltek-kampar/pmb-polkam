<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PMBWawancaraModel extends Model
{
    protected $table = "pmb_wawancara";
    protected $primaryKey = 'id';
    protected $keyType = "string";
    public $incrementing = false;
    protected $fillable = [
        'id',
        "nomor_registrasi",
        'status',
        "created_at",
        "updated_at",
    ];

    public function registrasi(): HasOne
    {
        return $this->hasOne(PMBRegistrasiModel::class, "nomor_registrasi", "nomor_registrasi");
    }
}
