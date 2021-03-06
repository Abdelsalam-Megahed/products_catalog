<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->paragraph,
        'price' => $faker->randomDigit,
        'quantity' => $faker->numberBetween($min = 10, $max = 900),
        'in_stock' => $faker->boolean,
        'rating' => $faker->randomFloat($nbMaxDecimals = NULL, $min = 0, $max = 5)
    ];
});
