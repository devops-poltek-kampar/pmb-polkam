<?php

namespace Database\Seeders;

use App\Models\PMBUsersModel;
use Illuminate\Database\Seeder;

class UserRolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $pmb = PMBUsersModel::where(['email' => "pmb@gmail.com"])->first();

        $pmb->assignRole('pmb');

        $keuangan = PMBUsersModel::where(['email' => "keuangan@gmail.com"])->first();

        $keuangan->assignRole('keuangan');

        $akademik = PMBUsersModel::where(['email' => 'akademik@gmail.com'])->first();
        $akademik->assignRole('akademik');
    }
}
