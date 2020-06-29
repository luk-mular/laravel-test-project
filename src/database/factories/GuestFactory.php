<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Guest;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(
    Guest::class,
    function (Faker $faker): array {
        return [
            'id_number' => Str::random(30),
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'email' => Str::uuid()->toString() . $faker->safeEmail,
            'phone' => $faker->phoneNumber,
            'city' => $faker->city,
            'country' => $faker->countryCode,
        ];
    }
);
