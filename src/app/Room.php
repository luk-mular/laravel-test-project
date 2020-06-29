<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * Class Room
 * @package App
 *
 * @property int $id
 * @property string $type
 * @property string $number
 * @property int $floor
 * @property float $price_default
 * @property Carbon|null $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Room extends Model
{
    /**
     * Setup fillable attributes.
     * @var string[]
     */
    public $fillable = [
        'type',
        'number',
        'floor',
        'price_default'
    ];
}
