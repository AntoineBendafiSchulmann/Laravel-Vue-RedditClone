<?php

namespace Database\Factories;

use App\Models\Community;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
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
            'community_id' => function() {
                return Community::inRandomOrder()->first()->id;
            },
            'user_id' => function() {
                return User::inRandomOrder()->first()->id;
            },
            'title' => $this->faker->name,
            'body' => $this->faker->text,
            'image' => $this->faker->imageUrl(640, 480, 'cats', true, 'Faker'),
            'slug' => $this->faker->slug,
            'status' => $this->faker->numberBetween(0, 1),
        ];
    }
}
