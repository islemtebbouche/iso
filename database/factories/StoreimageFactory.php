<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\storeimage;
use Faker\Generator as Faker;

$factory->define(storeimage::class, function (Faker $faker) {
    return [
        'image' => $faker->imageUrl($width = 640, $height = 480,'technics'),
    ];
});
