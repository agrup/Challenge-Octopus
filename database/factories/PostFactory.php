<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title'=> $faker->sentence($nbWords = 6, $variableNbWords = true),
        'contenido'=> $faker->sentence($nbWords = 6, $variableNbWords = true),
        'user_id'=> int_random(2),
    ];
});
