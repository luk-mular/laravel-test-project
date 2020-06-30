<?php

declare(strict_types=1);

namespace Tests\Feature\Reservations;

use App\Reservation;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\Response;
use RachidLaasri\Travel\Travel;
use Tests\TestCase;

/**
 * Class GetTest
 * @package Tests\Feature\Reservations
 */
class GetTest extends TestCase
{
    use DatabaseMigrations;

    public function testWithRelationshipPositive(): void
    {
        /** @var Reservation $reservation */
        $reservation = null;

        $expectedDateTimeString = '2019-01-01 20:00:00';

        Travel::to(
            Carbon::make($expectedDateTimeString),
            function () use (&$reservation): void {
                $reservation = factory(Reservation::class)
                    ->create(
                        [
                            'from' => '2020-02-08',
                            'to' => '2020-02-12',
                            'adults_amount' => 2,
                            'children_amount' => 0,
                            'infants_amount' => 0,
                            'first_name' => 'Tomasz',
                            'last_name' => 'Nowak',
                            'email' => 'tomasz.nowak@test.pl',
                            'phone' => null,
                            'status' => 'pending',
                            'notes' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                        ]
                    );
            }
        );

        $this->getJson('/api/reservations/1')
            ->assertStatus(Response::HTTP_OK)
            ->assertJson(
                [
                    'data' => [
                        'type' => 'reservations',
                        'id' => '1',
                        'attributes' => [
                            'from' => '2020-02-08',
                            'to' => '2020-02-12',
                            'adults_amount' => 2,
                            'children_amount' => 0,
                            'infants_amount' => 0,
                            'first_name' => 'Tomasz',
                            'last_name' => 'Nowak',
                            'email' => 'tomasz.nowak@test.pl',
                            'phone' => null,
                            'status' => 'pending',
                            'notes' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.',
                        ],
                        'relationships' => [
                            'room' =>
                                [
                                    'links' => [
                                        'related' => 'http://localhost/api/reservations/1/room'
                                    ],
                                    'data' => [
                                        'id' => '1',
                                        'type' => 'rooms',
                                    ]
                                ]
                        ],
                        'links' => [
                            'self' => 'http://localhost/api/reservations/1'
                        ]
                    ]
                ]
            );
    }
}
