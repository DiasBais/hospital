<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\query;
use Faker\Generator as Faker;

$factory->define(query::class, function (Faker $faker) {
    return [
        'patient' => $faker->name(),
        'doctor' => 'User',
        'reception' => (random_int(2020, 2025).'-'.random_int(1, 12).'-'.random_int(1, 28).' '.random_int(1, 24).':'.random_int(0, 60).':'.random_int(0, 60)),
        'user_id' => 1,
    ];
});
