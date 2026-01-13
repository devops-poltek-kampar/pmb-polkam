<?php

namespace Database\Seeders;

use App\Models\PMBUsersModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PMBUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PMBUsersModel::factory()->count(3)->create();
    }
}
