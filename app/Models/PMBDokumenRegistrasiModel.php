<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PMBDokumenRegistrasiModel extends Model
{
    protected $table = "pmb_dokumen_registrasi";

    protected $fillable = [
        'id',
        "pmb_registrasi_id",
        'pmb_jalur_masuk_id',
        "nama",
        "path",
        "status",
        "kategori"
    ];
}
