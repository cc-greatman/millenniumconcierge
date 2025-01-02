<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        \App\Models\User::factory(10)->create()->each(function ($user) {
            \App\Models\Membership::factory(1)->create(['user_id' => $user->id]);
            \App\Models\Trips::factory(5)->create(['user_id' => $user->id]);
            \App\Models\Identification::factory(1)->create(['user_id' => $user->id]);
            \App\Models\Bookings::factory(6)->create(['user_id' => $user->id]);
        });
    }
}
