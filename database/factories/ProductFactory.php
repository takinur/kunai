<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'detail' => $this->faker->unique()->safeEmail(),
            // 'email_verified_at' => now(),
            // 'password' => Hash::make('password'),
            // 'remember_token' => Str::random(10),
        ];
    }
}
