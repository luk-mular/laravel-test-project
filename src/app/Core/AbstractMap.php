<?php

declare(strict_types=1);

namespace App\Core;

/**
 * Base class for maps
 */
abstract class AbstractMap
{
    /**
     * Gets "value to" depending of "value from" or return default value
     *
     * @param mixed $valueFrom Value from
     * @param mixed $defaultVal Default value
     * @return mixed
     */
    public static function getValueTo($valueFrom, $defaultVal = null)
    {
        return static::getMap()[$valueFrom] ?? $defaultVal;
    }

    /**
     * Gets map array
     *
     * @return array
     */
    abstract protected static function getMap(): array;
}
