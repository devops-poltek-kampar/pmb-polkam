<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterProgramStudiModel extends Model
{
    protected $table = "master_program_studi";
    public $incrementing = false;
    protected $fillable = ['id', "master_dosen_id", "kode_prodi", "nama", "singkatan", 'jenjang'];
}
