<?php

declare(strict_types=1);

use RachidLaasri\Travel\Travel;

/**
 * Class RoomSeeder
 */
class GuestSeeder extends \Illuminate\Database\Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        collect(
            [
                '2020-02-08 12:34:34' => [
                    [
                        'id_number' => 'ABS123456',
                        'first_name' => 'Tomasz',
                        'last_name' => 'Nowak',
                        'email' => 'tomasz.nowak@test.pl',
                        'phone' => null,
                        'city' => 'Warszawa',
                        'country' => 'PL',
                    ],
                ],
                '2020-02-08 12:37:23' => [
                    [
                        'id_number' => 'ACT456234',
                        'first_name' => 'Anna',
                        'last_name' => 'Nowak',
                        'email' => 'anna.nowak@test.pl',
                        'phone' => null,
                        'city' => 'Warszawa',
                        'country' => 'PL',
                    ],
                ],
            ]
        )->each(
            fn($roomsData, $dateTime) => Travel::to(
                $dateTime,
                fn() => collect($roomsData)->each(
                    fn ($roomData) => factory(\App\Guest::class)->create($roomData)
                )
            )
        );
    }
}
