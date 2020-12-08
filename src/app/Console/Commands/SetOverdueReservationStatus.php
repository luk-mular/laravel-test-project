<?php

declare(strict_types=1);

namespace App\Console\Commands;

use App\BusinessLogic\Reservation\Status\StatusEnum;
use App\Reservation;
use Illuminate\Console\Command;

class SetOverdueReservationStatus extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reservation:status:overdue';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Setting overdue reservation statuses';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Reservation::where('to', '<', date('Y-m-d'))
            ->whereIn('status', [
                StatusEnum::PENDING,
                StatusEnum::CONFIRMED,
            ])
            ->update([
                'status' => StatusEnum::OVERDUE
            ]);
    }
}
