<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PMBNotifikasiModel extends Model
{
    protected $table = "pmb_notifikasi";
    protected $fillable = ['id', "pmb_users_id", "subjek", 'deskripsi', "created_at", "updated_at"];
}
