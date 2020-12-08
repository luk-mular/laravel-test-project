<?php

declare(strict_types=1);

namespace App\Core;

/**
 * Base class for enums
 */
abstract class AbstractEnum
{
    /**
     * Returns enums constants
     *
     * @return array
     * @throws \ReflectionException
     */
    public static function getConstants(): array
    {
        $reflectionObject = new \ReflectionClass(get_called_class());
        return $reflectionObject->getConstants();
    }
}
