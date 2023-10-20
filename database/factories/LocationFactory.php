<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Location>
 */
class LocationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            /*'ip' => fake()->localIpv4,*/
            'street'=>fake()->streetAddress,
            'latitude'=>fake()->latitude($min=-90, $max=90),
            'longitude'=>fake()->longitude($min=-180, $max=180),
            /*'coordinates'->$lat+$lon*/
        ];
    }
}
