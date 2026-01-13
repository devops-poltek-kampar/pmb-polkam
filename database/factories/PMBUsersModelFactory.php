<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PMBUsersModel>
 */
class PMBUsersModelFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "id" => strtoupper(Str::random(20)),
            "pmb_role_id" => 3,
            "username" => $this->faker->name(),
            "email" => $this->faker->unique()->safeEmail(),
            "password" => bcrypt("123456"),
            "nomor_hp" => "08123456789",
            "status" => "Suspend"
        ];
    }
}
