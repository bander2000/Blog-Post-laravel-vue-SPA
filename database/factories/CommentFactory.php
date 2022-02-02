<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        
        return [
            //
            'content' => $this->faker->paragraph($nbSentences = 7, $variableNbSentences = true),
            'subject'=>$this->faker->sentence($nbWords = 2, $variableNbWords = true),
            'blog_id'=> Blog::all()->unique()->random()->id,
            'user_id'=>User::all()->unique()->random()->id
        ];
    }
}
