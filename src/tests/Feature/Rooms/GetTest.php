<?php

declare(strict_types=1);

namespace Tests\Feature\Rooms;

use App\Room;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\Response;
use RachidLaasri\Travel\Travel;
use Tests\TestCase;

/**
 * Class GetTest
 * @package Tests\Feature\Rooms
 */
class GetTest extends TestCase
{
    use DatabaseMigrations;

    public function testGetPositive(): void
    {
        /** @var Room $room */
        $room = null;
        Travel::to(
            Carbon::make('2019-01-01 20:00:00'),
            function () use (&$room): void {
                $room = factory(Room::class)
                    ->create(
                        [
                            'type' => 'superior',
                            'number' => '201',
                            'floor' => '2',
                            'price_default' => 200,
                        ]
                    );
            }
        );

        $this->getJson('/api/rooms/' . $room->id)
            ->assertStatus(Response::HTTP_OK)
            ->assertJson(
                [
                    'data' => [
                        'type' => 'rooms',
                        'id' => "$room->id",
                        'attributes' => [
                            'type' => 'superior',
                            'number' => '201',
                            'floor' => '2',
                            'price_default' => '200.00',
                            'created_at' => '2019-01-01 20:00:00',
                            'updated_at' => '2019-01-01 20:00:00',
                        ],
                        'links' => [
                            'self' => 'http://localhost/api/rooms/' . $room->id
                        ]
                    ]
                ]
            );
    }

    public function testNotFound(): void
    {
        $this->getJson('/api/rooms/1')
            ->assertStatus(Response::HTTP_NOT_FOUND);
    }
}
