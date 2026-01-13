<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PMBCBTModel extends Model
{
    protected $table = "pmb_cbt";
    protected $keyType = "string";
    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        "nomor_registrasi",
        "status",
        'aktif',
        "created_at",
        "updated_at"
    ];
    public function registrasi(): HasOne
    {
        return $this->hasOne(PMBRegistrasiModel::class, "nomor_registrasi", "nomor_registrasi");
    }
}
