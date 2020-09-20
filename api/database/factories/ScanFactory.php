<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Scan;
use Faker\Generator as Faker;

$factory->define(Scan::class, function (Faker $faker) {
    return [
        'score_desktop'     => $faker->numberBetween(70, 95),
        'score_mobile'      => $faker->numberBetween(65, 90),
        'fcp_mobile'        => $faker->numberBetween(100, 10000),
        'fcp_desktop'       => $faker->numberBetween(100, 10000),
        'tti_mobile'        => $faker->numberBetween(100, 10000),
        'tti_desktop'       => $faker->numberBetween(100, 10000),
        'si_mobile'         => $faker->numberBetween(100, 10000),
        'si_desktop'        => $faker->numberBetween(100, 10000),
        'fmp_mobile'        => $faker->numberBetween(100, 10000),
        'fmp_desktop'       => $faker->numberBetween(100, 10000),
        'fcpu_idle_mobile'  => $faker->numberBetween(100, 10000),
        'fcpu_idle_desktop' => $faker->numberBetween(100, 10000),
        'ttfb_mobile'       => $faker->numberBetween(100, 10000),
        'ttfb_desktop'      => $faker->numberBetween(100, 10000)
    ];
});
