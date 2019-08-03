<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Breakfast;
use Faker\Generator as Faker;

$factory->define(Breakfast::class, function (Faker $faker) {
    static $num=1;
    static $n=1;
    return [
        'description'=>$faker->sentence(),
        'voting' =>$faker->numberBetween(1,20),
        'rating' =>$faker->numberBetween(1,5),
        'count' =>$faker->numberBetween(1,20),
        'caterId'=>$num,
        'companyId'=>$n++,
    ];
});
