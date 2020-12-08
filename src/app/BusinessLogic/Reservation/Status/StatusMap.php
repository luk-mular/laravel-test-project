<?php

declare(strict_types=1);

namespace App\BusinessLogic\Reservation\Status;

use App\Core\AbstractMap;

/**
 * Map for reservation statuses
 */
class StatusMap extends AbstractMap
{
    /**
     * Gets map array
     *
     * @todo write real map, this is just an example one
     *
     * @return array
     */
    protected static function getMap(): array
    {
        return [
            StatusEnum::CONFIRMED => [
                StatusEnum::COMPLETED,
            ],
        ];
    }
}
