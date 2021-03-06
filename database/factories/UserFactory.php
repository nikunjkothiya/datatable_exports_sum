<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use Illuminate\Support\Str;

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

$factory->define(App\Models\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'role_id'=>1,
        'email' => 'admin1@admin.com',
        'email_verified_at' => now(),
        'password' => '$2y$10$umdOzebLZ7Z4gFFaRkxBhe52cvX8Sbh4RkgUcwn9VVL0MMKY22bi.', // password
        'remember_token' => Str::random(10),
        'language_id' => 1
    ];
});
