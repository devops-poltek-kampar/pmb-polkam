<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MasterProgramStudiModel extends Model
{
    protected $table = "master_program_studi";
    protected $fillable = ['id', "master_dosen_id", "kode_prodi", "nama", "singkatan", 'jenjang'];
}
