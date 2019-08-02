<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Company;
use Faker\Generator as Faker;

$factory->define(Company::class, function (Faker $faker) {
    static $num=1;
    return [
        'Name' => $faker->company,
        'catererId' =>$num++,
        'breakfastId' =>$num++,
        'lunchId'=>$num++,
        'dinnerId'=>$num++
    ];
});
