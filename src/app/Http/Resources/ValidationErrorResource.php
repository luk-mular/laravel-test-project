<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ValidationErrorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $data = [
            'errors' => [],
        ];
        foreach ($this->getMessages() as $fieldName => $message) {
            $data['errors'][] = [
                'status' => 400, // TODO set status depending on validation
                'source' => [
                    'pointer' => '/' . str_replace('.', '/', $fieldName),
                ],
                'title' => $message,
            ];
        }
        return $data;
    }
}
