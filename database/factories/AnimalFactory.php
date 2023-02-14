<?php

use App\Animal;
use Illuminate\Support\Str;
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

$factory->define(Animal::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'shelter_id' => rand(10000,0),
        'race' => Str::random(10)
    ];
});
