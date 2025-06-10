<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trip>
 */
class TripFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->unique()->randomElement([
                'Off-Grid Camping in Jasper',
                'Surf & Storm in Tofino',
                'Paddle & Camp in Algonquin',
                'Underground Montréal',
                'Skylines & Squirrels in Toronto',
                'Northern Light Hunting in Yellowknife',
                'Whales & Waves in Tadoussac'
            ]),
            'region' => fake()->randomElement(['west', 'east', 'north', 'central']),
            'start_date' => fake()->dateTimeBetween('+1 month', '+2 years'),
            'duration_days' => fake()->numberBetween(1, 7),
            'price_per_person' => fake()->randomFloat(2, 99.99, 2345.56),
        ];
    }
}
