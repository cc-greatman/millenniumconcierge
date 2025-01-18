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
            'airline' => $this->faker->company, // Random airline name
            'ticket_type' => $this->faker->randomElement(['Round Trip', 'Single Trip', 'Multi-City Trip']),
            'departure_date' => $this->faker->dateTimeBetween('now', '+1 month')->format('Y-m-d H:i:s'), // Future departure date
            'arrival_date' => $this->faker->dateTimeBetween('+1 month', '+2 months')->format('Y-m-d H:i:s'), // After departure
            'baggage_allowance' => $this->faker->numberBetween(10, 50) . ' kg', // Random baggage allowance
            'cost' => $this->faker->randomFloat(2, 100, 10000),
            'departure' => $this->faker->city,
            'destination' => $this->faker->city,
            'seats' => $this->faker->numberBetween(1, 10), // Random seat count
            'status' => $this->faker->randomElement(['used', 'unused']),
            'extra_comments' => $this->faker->sentence, // Random comment
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
