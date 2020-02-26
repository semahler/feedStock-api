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

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->email,
    ];
});


use App\Manufacturer;

$factory->define(Manufacturer::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->company,
        'url' => $faker->url,
        'image'=>$faker->imageUrl('640', '480', 'cats')
    ];
});

$factory->define(\App\PackageUnit::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->words(3, true)
    ];
});
