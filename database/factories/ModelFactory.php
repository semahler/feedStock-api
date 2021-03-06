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

use App\Models\Comment;
use App\Models\Feed;
use App\Models\FeedType;
use App\Models\Manufacturer;
use App\Models\PackageUnit;
use App\Models\StockMovement;
use App\Models\StockTotal;

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

$factory->define(FeedType::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->words(3, true)
    ];
});

$factory->define(Feed::class, function (Faker\Generator $faker) {
    return [
        'manufacturer_id' => $faker->numberBetween(1, 10),
        'feed_type_id' => $faker->numberBetween(1, 3),
        'package_unit_id' => $faker->numberBetween(1, 3),
        'name' => $faker->words(3, true),
        'status' => $faker->boolean,
        'rating' => $faker->numberBetween(0, 10),
        'url' => $faker->url
    ];
});

$factory->define(Comment::class, function (Faker\Generator $faker) {
    return [
        'feed_id' => $faker->numberBetween(1, 10),
        'comment' => $faker->text(250)
    ];
});

$factory->define(StockMovement::class, function (Faker\Generator $faker) {
    return [
        'feed_id' => $faker->numberBetween(1, 10),
        'quantity' => $faker->randomDigit
    ];
});

$factory->define(StockTotal::class, function (Faker\Generator $faker) {
    return [
        'feed_id' => $faker->numberBetween(1, 10),
        'quantity' => $faker->randomDigit
    ];
});
