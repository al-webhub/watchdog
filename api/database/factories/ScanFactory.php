<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Scan;
use Faker\Generator as Faker;

$factory->define(Scan::class, function (Faker $faker) {
    return [
        'score_desktop'     => $faker->numberBetween(70, 95),
        'score_mobile'      => $faker->numberBetween(65, 90),
        'fcp_mobile'        => $faker->numberBetween(6000, 7000),
        'fcp_desktop'       => $faker->numberBetween(6000, 7000),
        'tti_mobile'        => $faker->numberBetween(1000, 2000),
        'tti_desktop'       => $faker->numberBetween(1000, 2000),
        'si_mobile'         => $faker->numberBetween(3000, 2000),
        'si_desktop'        => $faker->numberBetween(3000, 2000),
        'fcpu_idle_mobile'  => $faker->numberBetween(5000, 6000),
        'fcpu_idle_desktop' => $faker->numberBetween(5000, 6000),
        'ttfb_mobile'       => $faker->numberBetween(10, 1000),
        'ttfb_desktop'      => $faker->numberBetween(10, 1000)
    ];
});
