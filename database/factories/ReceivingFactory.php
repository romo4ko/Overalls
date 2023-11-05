<?php

namespace Database\Factories;

use App\Models\Employer;
use App\Models\Overalls;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Receiving>
 */
class ReceivingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'employer_id' => Employer::inRandomOrder()->first()->id, 
            'overall_id' => Overalls::inRandomOrder()->first()->id, 
        ];
    }
}
