<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Musicband>
 */
class MusicbandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $genre = ['Jazz', 'Classical', 'Reggae', 'Acoustic', 'Blues'];
        return [
            'bandName' => fake()->name(),
            'location' => fake()->city(),
            'year_started'=> fake()->year(),
            'groupNum'=> fake()->numberBetween($min = 1000, $max = 9000),
            'rate'=> fake()->numberBetween($min = 1000, $max = 9000),
            'genre'=> $this->faker->randomElement($genre),
            'description'=> fake()->sentence(),
            'image'=> 'images.jfif'
        ];
    }
}
