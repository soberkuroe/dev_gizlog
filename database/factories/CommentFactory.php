<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\Models\Comment::class, function (Faker $faker) {
    return [
        'user_id' => $faker->numberBetween(1, 0),
        'question_id' => $faker->numberBetween(1, 100),
        'comment' => $faker->realText($faker->numberBetween(10, 30)),
        'created_at' => $faker->datetime('now', date_default_timezone_get()),
    ];
});
