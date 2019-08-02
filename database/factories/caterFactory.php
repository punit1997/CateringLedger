<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Cater;
use Faker\Generator as Faker;

$factory->define(Cater::class, function (Faker $faker) {
    static $num=1;
    return [
      'name' => $faker->name,
        'rating' =>$num,
        'count' =>$num++
    ];
});
