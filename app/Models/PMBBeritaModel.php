<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PMBBeritaModel extends Model
{
    protected $table = "pmb_berita";
    protected $keyType = "string";

    public $incrementing = false;
    protected $fillable = [
        'id',
        "subjek",
        "slug",
        "deskripsi",
        "thumbnail",
        "created_at",
        "updated_at"
    ];
}
