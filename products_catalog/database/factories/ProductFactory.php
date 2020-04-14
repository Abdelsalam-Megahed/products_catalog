<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Faker\Generator as Faker;
use App\Product;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'description' => $faker->description,
        'price' => $faker->price,
        'quantity' => $faker->quantity,
        'in_stock' => $faker->in_stock,
        'rating' => $faker->rating,
        'category_id' => $faker->category_id
    ];
});
