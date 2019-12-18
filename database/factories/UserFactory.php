<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */
use App\User;
use App\Rank;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(User::class, function (Faker $faker) {
    return [
        'username' => $faker->userName(),
        'full_name' => $faker->name(),
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => $faker->password(),
        'remember_token' => Str::random(10),
        'rank_id' => function() {
            return Rank::all()->random()->id;
        }
    ];
});


