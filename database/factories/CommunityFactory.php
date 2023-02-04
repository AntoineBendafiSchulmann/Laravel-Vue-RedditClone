<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Client>
 */
class CommunityFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => function() {
                return User::inRandomOrder()->first()->id;//Attempt to read property "id" on null est une erreur qui 
            },
            'name' => $this->faker->name,
            'description' => $this->faker->text,
            'image' => $this->faker->imageUrl(640, 480, 'cats', true, 'Faker'),
            'slug' => $this->faker->slug,
            'status' => $this->faker->numberBetween(0, 1),
        ];
    }
}

