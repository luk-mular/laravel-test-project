<?php

declare(strict_types=1);

namespace Tests\Feature\Reservations;

use App\Reservation;
use App\Room;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\Response;
use RachidLaasri\Travel\Travel;
use Tests\TestCase;

/**
 * Class GetRelatedRoomTest
 * @package Tests\Feature\Reservations
 */
class GetRelatedRoomTest extends TestCase
{
    use DatabaseMigrations;

    public function testPositive(): void
    {
        $expectedDateTimeString = '2019-01-01 20:00:00';

        /** @var Room $room */
        $room = null;
        Travel::to(
            Carbon::make($expectedDateTimeString),
            function () use (&$room): void {
                $room = factory(Room::class)
                    ->create(
                        [
                            'type' => 'superior',
                            'number' => '201',
                            'floor' => '2',
                            'price_default' => 219,
                        ]
                    );
            }
        );

        /** @var Reservation $reservation */
        $reservation = factory(Reservation::class)->create(['room_id' => $room->id]);

        $this->getJson(sprintf("/api/reservations/%s/room", $reservation->id))
            ->assertStatus(Response::HTTP_OK)
            ->assertJson(
                [
                    'data' => [
                        'type' => 'rooms',
                        'id' => $room->id,
                        'attributes' => [
                            'type' => 'superior',
                            'number' => '201',
                            'floor' => '2',
                            'price_default' => 219,
                            'created_at' => $expectedDateTimeString,
                            'updated_at' => $expectedDateTimeString,
                        ],
                        'links' => [
                            'self' => 'http://localhost/api/rooms/' . $room->id
                        ]
                    ]
                ]
            );
    }

    public function testWithRoomDeletedPositive(): void
    {
        $expectedDateTimeString = '2019-01-01 20:00:00';

        /** @var Room $room */
        $room = null;
        Travel::to(
            Carbon::make($expectedDateTimeString),
            function () use (&$room): void {
                $room = factory(Room::class)
                    ->create(
                        [
                            'type' => 'superior',
                            'number' => '201',
                            'floor' => '2',
                            'price_default' => 219,
                        ]
                    );
            }
        );

        /** @var Reservation $reservation */
        $reservation = factory(Reservation::class)->create(['room_id' => $room->id]);

        Travel::to(
            $expectedDateTimeString,
            fn () => $room->delete()
        );

        $this->getJson(sprintf("/api/reservations/%s/room", $reservation->id))
            ->assertStatus(Response::HTTP_OK)
            ->assertJson(
                [
                    'data' => [
                        'type' => 'rooms',
                        'id' => $room->id,
                        'attributes' => [
                            'type' => 'superior',
                            'number' => '201',
                            'floor' => '2',
                            'price_default' => 219,
                            'created_at' => $expectedDateTimeString,
                            'updated_at' => $expectedDateTimeString,
                        ],
                        'links' => [
                            'self' => 'http://localhost/api/rooms/' . $room->id
                        ]
                    ]
                ]
            );
    }

    public function testRoomDoesNotExists(): void
    {
        /** @var Reservation $reservation */
        $reservation = factory(Reservation::class)->create(['room_id' => null]);

        $this->getJson(sprintf("/api/reservations/%s/room", $reservation->id))
            ->assertStatus(Response::HTTP_NOT_FOUND);
    }
}
