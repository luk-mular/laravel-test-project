<?php

declare(strict_types=1);

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * Class Guest
 * @package App
 *
 * @property int $id
 * @property string $id_number
 * @property string $first_name
 * @property string|null $email
 * @property string|null $phone
 * @property string $city
 * @property string $country
 * @property Carbon|null $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 */
class Guest extends Model
{
    use SoftDeletes;
}
