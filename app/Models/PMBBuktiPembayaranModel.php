<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PMBBuktiPembayaranModel extends Model
{
    protected $table = "pmb_bukti_pembayaran";
    protected $keyType = 'string';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = ['id', "pmb_registrasi_nomor_registrasi", "path", "status", "kategori", "created_at", 'updated_at'];
    public function registrasi(): HasOne
    {
        return $this->hasOne(PMBRegistrasiModel::class, "nomor_registrasi", "pmb_registrasi_nomor_registrasi");
    }
}
