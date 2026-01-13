<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PMBForgotPasswordModel extends Model
{
    protected $table = "pmb_forgot_password";
    protected $keyType = "string";
    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $fillable = [
        'id',
        "pmb_users_email",
        "token",
        "created_at",
        'updated_at'
    ];
}
