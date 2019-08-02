<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Lunch;
use Faker\Generator as Faker;

$factory->define(Lunch::class, function (Faker $faker) {
    static $num=1;
    return [
        'description' => $fake->lorem,
        'voting' =>$num,
        'rating' =>$num,
        'count' =>$num,
        'caterId' =>$num,
        'companyId' =>$num++
    ];
});
