<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Reservation;
use App\Room;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(
    Reservation::class,
    function (Faker $faker): array {
        return [
            'room_id' => factory(Room::class)->create(),
            'from' => $faker->date('Y-m-d', '-2 months'),
            'to' => $faker->date(),
            'adults_amount' => 2,
            'children_amount' => 0,
            'infants_amount' => 0,
            'first_name' => 'Tomasz',
            'last_name' => 'Nowak',
            'email' => 'tomasz.nowak@test.pl',
            'phone' => null,
            'status' => 'pending',
            'notes' => $faker->text,
        ];
    }
);
