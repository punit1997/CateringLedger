<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\cater;
use Faker\Generator as Faker;

$factory->define(cater::class, function (Faker $faker) {
    return [
        'name'=>$faker->name,
        'rating'=>$faker->numberBetween(1,5),
        'count'=>$faker->numberBetween(1,20),
    ];
});
