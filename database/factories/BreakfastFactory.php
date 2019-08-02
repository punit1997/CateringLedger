<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Breakfast;
use Faker\Generator as Faker;

$factory->define(Breakfast::class, function (Faker $faker) {
    static $num=1;
    return [
        'id' => $num+5,
        'description' => $faker->sentence(),
        'voting' =>$num,
        'rating' =>$num,
        'count' =>$num,
        'caterId' =>$num,
        'companyId' =>$num++
    ];
});
