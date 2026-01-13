<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PMBJalurMasukProdiModel extends Model
{
    protected $table = "pmb_jalur_masuk_prodi";
    protected $keyType = "string";
    public $incrementing = false;
    protected $primaryKey = 'id';
    protected $fillable = [
        'id',
        'pmb_jalur_masuk_id',
        "master_program_studi_id",
        'keterangan',
        'created_at',
        "updated_at"
    ];


    public function prodi(): HasOne
    {
        return $this->hasOne(MasterProgramStudiModel::class, "id", "master_program_studi_id");
    }
}
