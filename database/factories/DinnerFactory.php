<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Dinner;
use Faker\Generator as Faker;

$factory->define(Dinner::class, function (Faker $faker) {
    static $num=1;
    return [
        'description'=>$faker->sentence(),
        'voting' =>$faker->$num,
        'rating' =>$faker->$num,
        'count' =>$faker->$num,
        'caterId'=>$num,
        'companyId'=>$num++,
    ];
});
