<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bookings>
 */
class BookingsFactory extends Factory
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
            'hotel' => $this->faker->company,
            'room_type' => $this->faker->randomElement(['Executive Suite', 'Penthouse', 'Single Room']),
            'room_qty' => $this->faker->numberBetween(1, 10),
            'cost' => $this->faker->randomFloat(2, 50, 1000),
            'check_in' => $this->faker->dateTimeBetween('now', '+1 week')->format('Y-m-d'),
            'check_out' => $this->faker->dateTimeBetween('+1 week', '+2 weeks')->format('Y-m-d'),
            'details' => $this->faker->text(50),
            'status' => $this->faker->randomElement(['used', 'unused']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
