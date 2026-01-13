<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PMBJalurMasukModel extends Model
{

    protected $table = "pmb_jalur_masuk";
    protected $keyType = "string";
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = [
        'id',
        'pmb_gelombang_id',
        "pmb_jalur_id",
        'biaya_registrasi',
        "status",
        "keterangan",
        "created_at",
        "updated_at"
    ];

    public function prodi(): HasMany
    {
        return $this->hasMany(PMBJalurMasukProdiModel::class, "pmb_jalur_masuk_id", "id");
    }

    public function gelombang(): HasOne
    {
        return $this->hasOne(PMBGelombangModel::class, "id", "pmb_gelombang_id");
    }

    public function dokumen(): HasMany
    {
        return $this->hasMany(PMBDokumenJalurModel::class, "pmb_jalur_masuk_id", "id");
    }

    public function jalur(): HasOne
    {
        return $this->hasOne(PMBJalurModel::class, "id", "pmb_jalur_id");
    }

    public function program_studi(): HasMany
    {
        return $this->hasMany(PMBJalurMasukProdiModel::class, "pmb_jalur_masuk_id", "id");
    }
}
