<?php

namespace Database\Factories;

use App\Models\Catogry;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $images=[
            '/assets/images/banner-item-01.jpg',
            '/assets/images/banner-item-03.jpg',
            '/assets/images/banner-item-04.jpg',
            '/assets/images/banner-item-05.jpg',
        ];

        $k = array_rand($images);
        $v = $images[$k];

        return [
            'title' => $this->faker->sentence($nbWords = 4, $variableNbWords = true),
            'content' => $this->faker->paragraph($nbSentences = 40, $variableNbSentences = true),
            'image'=> $v,
            'user_id'=>User::all()->unique()->random()->id,
            'catogry_id'=>Catogry::all()->unique()->random()->id
        ];
    }
}
