<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PMBJalurModel extends Model
{

    protected $table = "pmb_jalur";
    protected $primaryKey = 'id';
    protected $keyType = 'string';
    protected $fillable = ['id', 'nama'];
}
