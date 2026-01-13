<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PMBBerkasModel extends Model
{
    protected $table = "pmb_berkas";
    protected $keyType = "string";
    protected $fillable = [
        'id',
        "pmb_pengajuan_berkas_id",
        'nama',
        "path",
        "kategori",
        "status",
        'message',
        "created_at",
        "updated_at"
    ];
}
