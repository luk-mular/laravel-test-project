<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

/**
 * Class RoomResource
 * @package App\Http\Resources
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
class RoomResource extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'type' => 'rooms',
            'id' => (string)$this->id,
            'attributes' => [
                'type' => (string)$this->type,
                'number' => (string)$this->number,
                'floor' => (string)$this->floor,
                'price_default' => (float)$this->price_default,
                'created_at' => $this->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
            ],
            'links' => [
                'self' => route('rooms.show', $this->id)
            ]
        ];
    }
}
