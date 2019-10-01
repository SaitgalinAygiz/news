<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Coords;
use App\Model;
use Faker\Generator as Faker;

$factory->define(Coords::class, function (Faker $faker) {
    return [
        'address_longitude' => '54.72405461',
        'address_latitude' => '55.94686377',
        'news_id' => function() {
            return factory(App\News::class)->create()->id;
        }
    ];
});
