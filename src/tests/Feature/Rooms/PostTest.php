<?php

declare(strict_types=1);

namespace Tests\Feature\Rooms;

use Carbon\Carbon;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Http\Response;
use Illuminate\Testing\TestResponse;
use RachidLaasri\Travel\Travel;
use Tests\TestCase;

/**
 * Class PostTest
 * @package Tests\Feature\Rooms
 */
class PostTest extends TestCase
{
    use DatabaseMigrations;

    protected TestResponse $testResponse;

    public function testPositive(): void
    {
        $expectedCreationDatetime = '2019-01-01 20:00:00';
        $expectedAttributes = [
            'type' => 'suite',
            'number' => '418',
            'floor' => '4',
            'price_default' => 666,
        ];

        Travel::to(
            Carbon::make($expectedCreationDatetime),
            fn() => $this->testResponse = $this->postJson(
                '/api/rooms',
                [
                    'data' => [
                        'type' => 'rooms',
                        'attributes' => $expectedAttributes
                    ]
                ]
            )
        );

        $this->testResponse
            ->assertStatus(Response::HTTP_CREATED)
            ->assertJsonFragment(
                [
                    'type' => 'rooms',
                    'attributes' => array_merge(
                        $expectedAttributes,
                        [
                            'created_at' => $expectedCreationDatetime,
                            'updated_at' => $expectedCreationDatetime,
                        ]
                    )
                ]
            );
    }
}
