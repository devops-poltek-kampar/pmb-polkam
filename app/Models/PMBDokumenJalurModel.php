<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PMBDokumenJalurModel extends Model
{
    protected $table = "pmb_dokumen_jalur";
    protected $keyType = "string";
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'pmb_jalur_masuk_id',
        "nama",
        'name_attribute',
        "tipe",
        "sifat",
    ];
}
