<?php

/* @var $factory \Illuminate\Database\Eloquent\Factory */

use App\Post;
use Faker\Generator as Faker;

$factory->define(Post::class, function (Faker $faker) {
    return [
        'title'=>$faker->sentence(7, 11),
        'body' => $faker->paragraph(rand(10,15)),
        'user_id' => 1,
    ];
});
