<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Image;
use Faker\Generator as Faker;

$factory->define(Image::class, function (Faker $faker) {
    return [
        'image' => 'images/EGWyM4LduzMaZCHIJJH9fsIEUBQOHCUFKb177Hso.jpeg',
        'news_id' => function() {
            return factory(App\News::class)->create()->id;
        }

    ];
});
