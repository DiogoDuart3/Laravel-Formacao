<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Pen;
use Faker\Generator as Faker;

$factory->define(Pen::class, function (Faker $faker) {
    return [
        'name' => $faker->name(),
        'capacity' => $faker->numberBetween(1, 100),
    ];
});
