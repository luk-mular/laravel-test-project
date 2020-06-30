<?php

declare(strict_types=1);

namespace App\Http\Resources;

use App\Room;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

/**
 * Class RoomResource
 * @package App\Http\Resources
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
class ReservationResource extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $roomRelationship = [];
        if ($this->room_id) {
            $roomRelationship['links'] = [
                'related' => route('rooms.show', $this->room_id)
            ];
            $roomRelationship['data'] = [
                'id' => (string)$this->room_id,
                'type' => 'rooms',
            ];
        }

        return [
            'type' => 'reservations',
            'id' => (string)$this->id,
            'attributes' => [
                'from' => $this->from->format('Y-m-d'),
                'to' => $this->to->format('Y-m-d'),
                'adults_amount' => (int)$this->adults_amount,
                'children_amount' => (int)$this->children_amount,
                'infants_amount' => (int)$this->infants_amount,
                'first_name' => (string)$this->first_name,
                'last_name' => (string)$this->last_name,
                'email' => $this->email ? (string)$this->email : null,
                'phone' => $this->phone ? (string)$this->phone : null,
                'status' => (string)$this->status,
                'notes' => $this->notes ? (string)$this->notes : null,
                'created_at' => $this->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
            ],
            'relationships' => [
                'room' => $roomRelationship
            ],
            'links' => [
                'self' => route('reservations.show', $this->id)
            ]
        ];
    }
}
