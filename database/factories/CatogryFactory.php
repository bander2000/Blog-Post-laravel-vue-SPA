<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CatogryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $catogries=[
            "Nature Lifestyle",
            "Awesome Layouts",
            "Creative Ideas",
            "Responsive Templates",
            "HTML5 / CSS3 Templates",
            "Creative & Unique"
        ];

        $k = array_rand($catogries);
        $v = $catogries[$k];

        return [
            //
            'name'=> $v
        ];
    }
}
