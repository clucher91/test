<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Sensor;
use Faker\Generator as Faker;

$factory->define(Sensor::class, function (Faker $faker) {
    return [
        'point_name' => $faker->domainName,
        'point_x' => $faker->randomDigit,
        'point_y' => $faker->randomDigit,
    ];
});
