<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Commentary>
 */
class CommentaryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            
            'user_id' => function() {
                return User::inRandomOrder()->first()->id;
            },

            'post_id' => function() {
                return Post::inRandomOrder()->first()->id;
            },

            'body' => $this->faker->text,
            
        ];
    }
}
