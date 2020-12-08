<?php

declare(strict_types=1);

namespace App\BusinessLogic\Reservation\Status;

use App\Core\AbstractEnum;

/**
 * Enum for reservation statuses
 */
class StatusEnum extends AbstractEnum
{
    public const PENDING = 'pending';

    public const CONFIRMED = 'confirmed';

    public const CANCELLED = 'cancelled';

    public const COMPLETED = 'completed';

    public const OVERDUE = 'overdue';
}
