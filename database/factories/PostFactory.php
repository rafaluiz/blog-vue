<?php

use Faker\Generator as Faker;
use App\Models\Post;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'user_id' =>6,
        'title'  =>$faker->word,
        'body' =>$faker->sentence(),
    ];
});
