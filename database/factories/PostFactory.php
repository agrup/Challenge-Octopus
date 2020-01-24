<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title'=> $faker->sentence($nbWords = 6, $variableNbWords = true),
        'body'=> $faker->sentence($nbWords = 6, $variableNbWords = true),
        'user_id'=> function (){
            return factory(App\User::class)->create()->id;
        },
        'filename'=>'img-1.jpg'
    ];
});
