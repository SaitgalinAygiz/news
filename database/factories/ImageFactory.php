<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    return [
        'image' => $faker->sentence,
        'news_id' => function() {
            return factory(App\News::class)->create()->id;
        }

    ];
});
