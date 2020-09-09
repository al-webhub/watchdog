<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Scan;
use Faker\Generator as Faker;

$factory->define(Scan::class, function (Faker $faker) {
    return [
        'score_desktop' => $faker->numberBetween(1, 100),
        'score_mobile'  => $faker->numberBetween(1, 100)
    ];
});
