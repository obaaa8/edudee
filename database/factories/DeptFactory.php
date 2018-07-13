<?php

use Faker\Generator as Faker;

$factory->define(App\Dept::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
    ];
});
