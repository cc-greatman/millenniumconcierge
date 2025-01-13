<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trips>
 */
class TripsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'user_id' => \App\Models\User::factory(),
            'type' => $this->faker->randomElement(['private', 'commercial', 'yacht', 'helicopter']),
            'destination' => $this->faker->city,
            'departure' => $this->faker->city,
            'cost' => $this->faker->randomFloat(2, 100, 10000),
            'seats' => $this->faker->randomDigit(),
            'status' => $this->faker->randomElement(['used', 'unused']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
