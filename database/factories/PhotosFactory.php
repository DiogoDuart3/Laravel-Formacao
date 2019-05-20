<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Photo;
use Faker\Generator as Faker;

$factory->define(Photo::class, function (Faker $faker) {
    return [
        'path' => $faker->unique()->name(),
        'imageable_id' => random_int(1,10),
        'imageable_type' => 'App\User',
    ];
});
