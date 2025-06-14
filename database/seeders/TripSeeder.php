<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Trip;
use App\Models\Booking;

class TripSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $regions = ['west', 'east', 'north', 'central'];
        foreach ($regions as $region) {
            Trip::factory()->create([
                'region' => $region,
                'title' => match ($region) {
                    'west' => 'Off-Grid Camping in Jasper',
                    'east' => 'Underground Montréal',
                    'north' => 'Northern Light Hunting in Yellowknife',
                    'central' => 'Skylines & Squirrels in Toronto',
                }
            ]);
        }

        Trip::factory()->count(2)->create();

        Trip::all()->each(function ($trip) {
            Booking::factory()->count(4)->create([
                'trip_id' => $trip->id,
                'status' => fake()->randomElement(['pending', 'confirmed', 'cancelled'])
            ]);
        });
    }
}
