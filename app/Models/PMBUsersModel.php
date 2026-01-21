<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

class PMBUsersModel extends Authenticatable
{
    use HasFactory, HasUuids;
    protected $table = "pmb_users";
    public $incrementing = false;
    protected $keyType = "string";

    protected $fillable = [
        'id',
        'google_id',
        "pmb_role_id",
        "username",
        "email",
        "status",
        "nomor_hp",
        "password",
        'foto_profile'
    ];

    protected $hidden = [
        "password",
        'created_at',
        'updated_at'
    ];
}
