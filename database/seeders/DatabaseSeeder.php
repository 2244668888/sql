<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed users
        \App\Models\User::factory(10)->create();

        // Seed categories
        $this->call(CategorySeeder::class);
    }
}
