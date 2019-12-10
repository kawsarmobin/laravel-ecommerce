<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use Faker\Generator as Faker;

$factory->define(\App\Models\Product::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(5),
        'image' => 'uploads/products/example.png',
        'price' => $faker->numberBetween(100, 1000),
        'description' => $faker->paragraph(4)
    ];
});
