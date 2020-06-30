<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * Class Reservation
 * @package App
 *
 * @property int $id
 * @property Room|null $room;
 * @property int|null $room_id
 * @property Carbon $from
 * @property Carbon $to
 * @property int $adults_amount
 * @property int $children_amount
 * @property int $infants_amount
 * @property string $first_name
 * @property string $last_name
 * @property string|null $email
 * @property string|null $phone
 * @property string|null $notes
 * @property string $status
 * @property Carbon|null $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 */
class Reservation extends Model
{
    use SoftDeletes;

    /**
     * @var string[]
     */
    public $dates = ['from', 'to'];

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}
