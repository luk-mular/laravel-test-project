<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Room;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(
    Room::class,
    function (Faker $faker): array {
        return [
            'type' => $faker->randomElement(
                [
                    'superior',
                    'executive',
                    'suite'
                ]
            ),
            'number' => (string)$faker->numberBetween(200, 400),
            'floor' => $faker->randomElement(
                [
                    '2',
                    '3',
                    '4'
                ]
            ),
            'price_default' => $faker->randomFloat(2, 100, 1000),
        ];
    }
);
