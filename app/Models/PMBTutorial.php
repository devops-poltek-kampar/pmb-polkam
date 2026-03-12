<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PMBTutorial extends Model
{
    protected $table = 'pmb_tutorial';
    protected $fillable = ['id', 'link', 'created_at', 'updated_at'];
}
