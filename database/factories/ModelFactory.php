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

use App\Food;
use App\FoodType;
use App\Manufacturer;
use App\PackageUnit;

$factory->define(Manufacturer::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->company,
        'url' => $faker->url,
        'image'=>$faker->imageUrl('640', '480', 'cats')
    ];
});

$factory->define(PackageUnit::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->words(3, true)
    ];
});

$factory->define(FoodType::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->words(3, true)
    ];
});

$factory->define(Food::class, function (Faker\Generator $faker) {
    return [
        'manufacturer_id' => $faker->numberBetween(1, 10),
        'food_type_id' => $faker->numberBetween(1, 3),
        'package_unit_id' => $faker->numberBetween(1, 3),
        'name' => $faker->words(3, true),
        'status' => $faker->boolean,
        'rating' => $faker->numberBetween(0, 10),
        'url' => $faker->url
    ];
});
