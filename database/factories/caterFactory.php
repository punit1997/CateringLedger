<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\cater;
use Faker\Generator as Faker;

$factory->define(company::class, function (Faker $faker) {
    static $num=1;
    return [
      'name' => $faker->name,
        'rating' =>$num,
        'count' =>$num++
    ];
});
