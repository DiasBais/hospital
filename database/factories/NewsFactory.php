<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence(10),
        'description' => $faker->text(),
        'photo' => 'https://picsum.photos/400/400'
    ];
});
