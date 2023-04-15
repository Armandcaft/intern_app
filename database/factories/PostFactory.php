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
    public function definition()
    {
        return [
            'post_title' => $this->faker->unique()->sentence(),
            'description' => $this->faker->text(),
            'blog_id' => 1,
            // 'comment_id' => 1,
        ];
    }
}
