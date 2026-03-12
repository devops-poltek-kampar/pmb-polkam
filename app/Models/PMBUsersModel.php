<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Spatie\Permission\Traits\HasRoles;

class PMBUsersModel extends Authenticatable
{
    use HasFactory, HasUuids, HasRoles;
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
