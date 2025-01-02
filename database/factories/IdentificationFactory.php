<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Identification>
 */
class IdentificationFactory extends Factory
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
            'type' => $this->faker->randomElement(['local_passport', 'intl_passport', 'drivers_license', 'nin', 'voters_card']),
            'file' => 'uploads/' .$this->faker->uuid. '.jpg',
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
