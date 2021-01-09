<?php

namespace Database\Factories;

use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class PostFactory extends Factory
{
    protected $model = Post::class;

    public function definition()
    {
        return [
            'user_id'   => User::factory(),
            'title'     => $this->faker->sentence,
            'post_image'=> 'https://placehold.it/1000X300',
            'body'      => $this->faker->paragraph,
        ];
    }
}
