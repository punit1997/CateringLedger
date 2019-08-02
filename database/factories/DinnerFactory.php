<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Dinner;
use Faker\Generator as Faker;

$factory->define(Dinner::class, function (Faker $faker) {
    static $num=1;
    return [
        'description'=>$faker->sentence(),
        'voting' =>$faker->numberBetween(1, 20),
        'rating' =>$faker->numberBetween(1,10),
        'count' =>$faker->numberBetween(1,1000),
        'caterId'=>$num,
        'companyId'=>$num++,
    ];
});
