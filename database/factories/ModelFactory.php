<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

/** @var \Illuminate\Database\Eloquent\Factory $factory */
$factory->define(App\User::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => $password ?: $password = bcrypt('password'),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Projet::class, function (Faker\Generator $faker) {
    static $password;

    return [
        'user_id' => 1,
        'title' => $faker->unique()->text($maxNbChars = 35),
        'isPrivate' => $faker->boolean($chanceOfGettingTrue = 50),
        'inviteURL' => bin2hex(random_bytes(5))
    ];
});
