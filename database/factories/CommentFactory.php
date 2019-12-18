<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comment;
use App\User;
use App\Post;
use Faker\Generator as Faker;

$factory->define(Comment::class, function (Faker $faker) {
    return [
        'content' => $faker->text($maxNbChars = 50),
        'number_of_agrees' => $faker->numberBetween($min = 0, $max = 15),
        'number_of_disagrees' => $faker->numberBetween($min = 0, $max = 15),
        'user_id' => function() {
            return User::all()->random()->id;
        },
        'post_id' => function() {
            return Post::all()->random()->id;
        }
    ];
});

