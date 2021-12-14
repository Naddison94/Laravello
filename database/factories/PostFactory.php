<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => Str::uuid()->toString(),
            'user_id' => Str::uuid()->toString(),
            'category_id' => Str::uuid()->toString(),
            'title' => 'Post title',
            'body' => 'Post body',
            'img' => 'image.jpg',
        ];
    }
}
