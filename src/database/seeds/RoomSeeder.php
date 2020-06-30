<?php

declare(strict_types=1);

use RachidLaasri\Travel\Travel;

/**
 * Class RoomSeeder
 */
class RoomSeeder extends \Illuminate\Database\Seeder
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
                '2019-01-13 10:34:27' => [
                    [
                        'type' => 'superior',
                        'number' => '201',
                        'floor' => '2',
                        'price_default' => 200,
                    ],
                    [
                        'type' => 'superior',
                        'number' => '202',
                        'floor' => '2',
                        'price_default' => 200,
                    ],
                ],
                '2019-01-13 10:34:28' => [
                    [
                        'type' => 'superior',
                        'number' => '301',
                        'floor' => '3',
                        'price_default' => 200,
                    ],
                    [
                        'type' => 'superior',
                        'number' => '302',
                        'floor' => '3',
                        'price_default' => 200,
                    ],
                    [
                        'type' => 'superior',
                        'number' => '303',
                        'floor' => '3',
                        'price_default' => 200,
                    ],
                    [
                        'type' => 'executive',
                        'number' => '304',
                        'floor' => '3',
                        'price_default' => 300,
                    ],
                    [
                        'type' => 'executive',
                        'number' => '305',
                        'floor' => '3',
                        'price_default' => 300,
                    ],
                ],
                '2019-01-13 10:35:01' => [
                    [
                        'type' => 'executive',
                        'number' => '401',
                        'floor' => '4',
                        'price_default' => 300,
                    ],
                ],
                '2019-01-13 10:35:02' => [
                    [
                        'type' => 'executive',
                        'number' => '402',
                        'floor' => '4',
                        'price_default' => 300,
                    ],
                ],
                '2019-01-13 10:36:01' => [
                    [
                        'type' => 'suite',
                        'number' => '403',
                        'floor' => '4',
                        'price_default' => 450,
                    ],
                ],
                '2019-01-13 10:36:27' => [
                    [
                        'type' => 'suite',
                        'number' => '404',
                        'floor' => '4',
                        'price_default' => 450,
                    ],
                ],
            ]
        )->each(
            fn($roomsData, $dateTime) => Travel::to(
                $dateTime,
                fn() => collect($roomsData)->each(
                    fn ($roomData) => factory(\App\Room::class)->create($roomData)
                )
            )
        );
    }
}
