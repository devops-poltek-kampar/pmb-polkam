<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PMBBeranda extends Model
{
    protected $table = "pmb_beranda";

    public $incrementing = false;

    protected $primaryKey = 'id';

    protected $keyType = "string";

    protected $fillable = ['id', 'banner_path', 'link_video', 'path_img1', 'path_img2', 'path_img3'];
}
