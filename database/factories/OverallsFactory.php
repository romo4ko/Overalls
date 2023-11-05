<?php

namespace Database\Factories;

use Arr;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Overalls>
 */
class OverallsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => Arr::random(['from electricity', 'protective', 'temperature resistant']), 
            'term' => Carbon::now()->subMonths(rand(1, 12)), 
            'cost' => random_int(500, 5000),
        ];
    }
}
