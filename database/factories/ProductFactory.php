<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\product;
use Faker\Generator as Faker;

$factory->define(product::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(6),
        'price' => $faker->numberBetween(50,300),
        'image' => $faker->imageUrl($width = 640, $height = 480) ,// 'http://lorempixel.com/640/480/' ,
        'pricedel' => $faker->numberBetween(50,300),
        'category' => $faker->sentence(6),
        'sile' => $faker->numberBetween(5,90),
        'description' => $faker->sentence(20),
    ];



});
