<?php

namespace Database\Seeders;

use App\Models\PMBGelombangModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PMBGelombangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PMBGelombangModel::factory()->count(3)->create();
    }
}
