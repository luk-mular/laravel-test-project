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
            'adults_amount' => $faker->numberBetween(1, 3),
            'children_amount' => 0,
            'infants_amount' => 0,
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'email' => Str::uuid()->toString() . $faker->safeEmail,
            'phone' => $faker->phoneNumber,
            'status' => $faker->randomElement(
                [
                    'pending',
                    'cancelled'
                ]
            ),
            'notes' => $faker->text,
        ];
    }
);
