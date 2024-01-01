<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [


            'user_id' => rand(1, 10),
            "caption"=> $this->faker->sentence,
            'likes' => fake()->randomNumber(),
            // 'image' => $this->faker->image('public/storage/images',360,240, null, false),

        ];
    }
}
