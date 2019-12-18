<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Post;
use App\User;
use App\Factory;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence($nbWords = 5, $variableNbWords = true),
        'content' => $faker->text($maxNbChars = 500),
        'number_of_agrees' => $faker->numberBetween($min = 0, $max = 25),
        'number_of_disagrees' => $faker->numberBetween($min = 0, $max = 25),
        'user_id' => function() {
            return User::all()->random()->id;
        }
        
    ];
});

