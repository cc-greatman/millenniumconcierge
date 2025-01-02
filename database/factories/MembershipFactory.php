<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Membership>
 */
class MembershipFactory extends Factory
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
            'type' => $this->faker->numberBetween(1, 3),
            'start_date' => $this->faker->dateTimeBetween('2023-01-01', 'now')->format('Y-m-d'),
            'end_date' => function (array $attributes) {
                return \Carbon\Carbon::parse($attributes['start_date'])->addYear()->format('Y-m-d');
            },
            'status' => function (array $attributes) {
                $endDate = \Carbon\Carbon::parse($attributes['end_date']);
                return $endDate->isFuture() ? 'active' : $this->faker->randomElement(['inactive', 'canceled']);
            },
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
