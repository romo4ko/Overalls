<?php

namespace Database\Seeders;

use App\Models\Employer;
use App\Models\Overalls;
use App\Models\Receiving;
use App\Models\Workshop;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Workshop::factory()->count(3)->create();
        Overalls::factory()->count(10)->create();
        Employer::factory()->count(20)->create();
        Receiving::factory()->count(30)->create();
    }
}
