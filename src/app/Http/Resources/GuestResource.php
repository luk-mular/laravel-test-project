<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

/**
 * Class GuestResource
 * @package App\Http\Resources
 *
 * @property int $id
 * @property string $id_number
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $phone
 * @property string $city
 * @property string $country
 * @property Carbon|null $deleted_at
 * @property Carbon $created_at
 * @property Carbon $updated_at
 *
 */
class GuestResource extends JsonResource
{
    /**
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'type' => 'guests',
            'id' => $this->id,
            'attributes' => [
                'id_number' => (string)$this->id_number,
                'first_name' => (string)$this->first_name,
                'last_name' => (string)$this->last_name,
                'email' => $this->email ? (string)$this->email : null,
                'phone' => $this->phone ? (string)$this->phone : null,
                'city' => $this->city,
                'country' => $this->country,
                'created_at' => $this->created_at->format('Y-m-d H:i:s'),
                'updated_at' => $this->updated_at->format('Y-m-d H:i:s'),
            ],
            'links' => [
                'self' => route('guests.show', $this->id),
            ],
        ];
    }
}
