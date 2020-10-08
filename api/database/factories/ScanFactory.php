<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Scan;
use Faker\Generator as Faker;

$factory->define(Scan::class, function (Faker $faker) {
    return [
        'score_desktop'     => $faker->numberBetween(70, 95),
        'score_mobile'      => $faker->numberBetween(65, 90),
        'cls_mobile'        => $faker->randomFloat('3', 0,'4'),
        'cls_desktop'        => $faker->randomFloat('3', 0,'4'),
        'fcp_mobile'        => $faker->numberBetween(6000, 7000),
        'fcp_desktop'       => $faker->numberBetween(6000, 7000),
        'tti_mobile'        => $faker->numberBetween(1000, 2000),
        'tti_desktop'       => $faker->numberBetween(1000, 2000),
        'si_mobile'         => $faker->numberBetween(3000, 2000),
        'si_desktop'        => $faker->numberBetween(3000, 2000),
        'tbt_mobile'        => $faker->numberBetween(5000, 6000),
        'tbt_desktop'       => $faker->numberBetween(5000, 6000),
        'ttfb_mobile'       => $faker->numberBetween(10, 1000),
        'ttfb_desktop'      => $faker->numberBetween(10, 1000),
        'tbw_mobile'        => $faker->numberBetween(3000, 5000),
        'tbw_desktop'       => $faker->numberBetween(3000, 5000)
    ];
});
