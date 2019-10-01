<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\News;
use Faker\Generator as Faker;

$factory->define(News::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence,
        'description' => $faker->paragraph,
        'user_id' => function() {
            return factory('App\User')->create()->id;
        },
    ];
});
