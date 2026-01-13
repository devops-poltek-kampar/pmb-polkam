<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class PMBGelombangModel extends Model
{
    use HasFactory;
    protected $table = "pmb_gelombang";
    protected $keyType = 'string';
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = [
        'id',
        'tahun',
        "nama",
        "open",
        "close",
        "status"
    ];

    public function jalur_masuk(): HasMany
    {
        return $this->hasMany(PMBJalurMasukModel::class, "pmb_gelombang_id", "id");
    }
}
