<?php

declare(strict_types=1);

/**
 * Class ReservationsSeeder
 */
class ReservationsSeeder extends \Illuminate\Database\Seeder
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
                [
                    'room_id' => 6,
                    'from' => '2020-02-08',
                    'to' => '2020-02-12',
                    'adults_amount' => 2,
                    'children_amount' => 0,
                    'infants_amount' => 0,
                    'first_name' => 'Tomasz',
                    'last_name' => 'Nowak',
                    'email' => 'tomasz.nowak@test.pl',
                    'phone' => null,
                    'status' => 'completed',
                    'notes' => null,
                    'created_at' => '2020-01-13 08:05:31',
                    'updated_at' => '2020-02-08 13:23:06',
                ],
                [
                    'room_id' => null,
                    'from' => '2020-01-21',
                    'to' => '2020-01-23',
                    'adults_amount' => 1,
                    'children_amount' => 0,
                    'infants_amount' => 0,
                    'first_name' => 'test',
                    'last_name' => 'test',
                    'email' => 'test@test.pl',
                    'phone' => '123456789',
                    'status' => 'cancelled',
                    'notes' => null,
                    'deleted_at' => '2020-01-21 10:11:54',
                    'created_at' => '2020-01-21 08:23:21',
                    'updated_at' => '2020-01-21 09:35:11',
                ],
                [
                    'room_id' => 1,
                    'from' => '2020-07-15',
                    'to' => '2020-07-17',
                    'adults_amount' => 1,
                    'children_amount' => 0,
                    'infants_amount' => 0,
                    'first_name' => 'Joanna',
                    'last_name' => 'Wiśniewska',
                    'email' => 'joanna.wisniewska@test.pl',
                    'phone' => null,
                    'status' => 'confirmed',
                    'notes' => null,
                    'created_at' => '2020-05-25 09:12:45',
                    'updated_at' => '2020-05-25 10:08:23',
                ],
                [
                    'room_id' => null,
                    'from' => '2020-08-03',
                    'to' => '2020-08-09',
                    'adults_amount' => 2,
                    'children_amount' => 0,
                    'infants_amount' => 1,
                    'first_name' => 'Jan',
                    'last_name' => 'Kowalski',
                    'email' => 'jan.kowalski@test.pl',
                    'phone' => '+48595234543',
                    'status' => 'pending',
                    'notes' => null,
                    'created_at' => '2020-06-12 14:34:23',
                    'updated_at' => '2020-06-12 14:34:23',
                ],
            ]
        )->each(
            fn($data) => factory(\App\Reservation::class)->create($data)
        );
    }
}
