<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Room;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(
    Room::class,
    function (Faker $faker): array {
        return [
            'type' => 'superior',
            'number' => '201',
            'floor' => '2',
            'price_default' => 200,
        ];
    }
);
