<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Video>
 */
class VideoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'message'=>fake()->sentence,
            'video_path'=>fake()->url,
            'category_id'=>rand(1,4),
            'user_id'=>rand(1,5)
        ];
    }
}
