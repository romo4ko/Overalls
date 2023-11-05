<?php

namespace Database\Factories;

use App\Models\Workshop;
use Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employer>
 */
class EmployerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstname' => fake()->firstName(), 
            'lastname' => fake()->lastName(), 
            'job' => Arr::random(['electrician', 'carpenter', 'collector', 'cleaner']), 
            'workshop_id' => Workshop::inRandomOrder()->first()->id, 
            'sale' => random_int(1, 50),
        ];
    }
}
