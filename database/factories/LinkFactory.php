<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Document;
use App\Link;
use Faker\Generator as Faker;

$factory->define(Link::class, function (Faker $faker) {
    return [
        'document_id' => factory(Document::class),
        'title' => $faker->company,
        'url' => $faker->url,
    ];
});
