<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\doctor;
use Faker\Generator as Faker;

$factory->define(doctor::class, function (Faker $faker) {
    return [
        'name' => $faker->sentence(10),
        'phone' => $faker->phoneNumber(),
        'user_id' => 1,
        'direction_id' => numberBetween(1, 9),
    ];
});
