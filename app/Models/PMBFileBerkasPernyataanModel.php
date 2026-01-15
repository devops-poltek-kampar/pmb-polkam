<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PMBFileBerkasPernyataanModel extends Model
{
    protected $table = "pmb_file_berkas_pernyataan";
    protected $keyType = "string";
    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'pmb_berkas_pernyataan_id',
        "path",
        'status',
        "kategori",
        'created_at',
        "updated_at"
    ];

    public function berkas_pernyataan(): HasOne
    {
        return $this->hasOne(PMBBerkasPernyataanModel::class, "id", 'pmb_berkas_pernyataan_id');
    }
}
