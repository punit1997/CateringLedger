<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Dinner;
use Faker\Generator as Faker;

$factory->define(Dinner::class, function (Faker $faker) {
    static $num=1;
    return [
        'description' => $faker->sentence(),
        'voting' =>$num,
        'rating' =>$num,
        'count' =>$num,
        'caterId' =>$num,
        'companyId' =>$num++
    ];
});
