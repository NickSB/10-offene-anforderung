<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends Factory<\App\Models\Customer>
 */
class CustomerFactory extends Factory
{
    public function definition(): array
    {
        return [
            'name' => fake()->company(),
            'email' => fake()->unique()->companyEmail(),
            'phone' => fake()->optional()->phoneNumber(),
            'city' => fake()->city(),
            'hourly_rate' => fake()->randomElement([120, 140, 160]),
        ];
    }
}
