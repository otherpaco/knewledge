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
        'mediaType_id' => factory(MediaType::class),
    ];
});
