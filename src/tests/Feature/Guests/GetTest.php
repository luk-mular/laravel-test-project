<?php

declare(strict_types=1);

namespace Tests\Feature\Guests;

use App\Guest;
use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\Response;
use RachidLaasri\Travel\Travel;
use Tests\TestCase;

/**
 * Class GetTest
 * @package Tests\Feature\Guests
 */
class GetTest extends TestCase
{
    use DatabaseMigrations;

    public function testPositive(): void
    {
        $expectedDateTimeString = '2019-01-01 20:00:00';
        /** @var Guest $guest */
        $guest = null;

        Travel::to(
            Carbon::make($expectedDateTimeString),
            function () use (&$guest): void {
                $guest = factory(Guest::class)->create(
                    [
                        'id_number' => 'ABS123456',
                        'first_name' => 'Tomasz',
                        'last_name' => 'Nowak',
                        'email' => 'tomasz.nowak@test.pl',
                        'phone' => null,
                        'city' => 'Warszawa',
                        'country' => 'PL',
                    ]
                );
            }
        );

        $this->getJson('/api/guests/' . $guest->id)
            ->assertStatus(Response::HTTP_OK)
            ->assertJson(
                [
                    'data' => [
                        'type' => 'guests',
                        'id' => '1',
                        'attributes' => [
                            'id_number' => 'ABS123456',
                            'first_name' => 'Tomasz',
                            'last_name' => 'Nowak',
                            'email' => 'tomasz.nowak@test.pl',
                            'phone' => null,
                            'city' => 'Warszawa',
                            'country' => 'PL',
                        ],
                        'links' => [
                            'self' => 'http://localhost/api/guests/1'
                        ]
                    ]
                ]
            );
    }
}
