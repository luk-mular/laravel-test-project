<?php

declare(strict_types=1);

namespace App\BusinessLogic\Room\Type;

use App\Core\AbstractEnum;

/**
 * Enum for room types
 */
class TypeEnum extends AbstractEnum
{
    public const SUPERIOR = 'superior';

    public const EXECUTIVE = 'executive';

    public const SUITE = 'suite';
}
