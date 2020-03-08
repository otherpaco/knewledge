<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Document;
use App\MediaType;
use Faker\Generator as Faker;

$factory->define(Document::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'subtitle' => $faker->sentence,
        'abstract' => $faker->paragraph,
        'release_date' => $faker->dateTime,
        'media_type_id' => factory(MediaType::class),
        'language_code' => $faker->randomElement(['de', 'fr', 'en', 'es']),
    ];
});
