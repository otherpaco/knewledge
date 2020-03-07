<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\MediaType;
use Illuminate\Support\Str;
use Faker\Generator as Faker;

$factory->define(MediaType::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->word,
        'title' => Str::title($faker->word),
    ];
});
