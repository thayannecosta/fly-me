<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TravelRequestResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'status' => true,
            'travel_request' => [
                'id' => $this->id,
                'destination' => $this->destination,
                'departure_date' => $this->departure_date,
                'return_date' => $this->return_date,
                'status' => $this->status,
                'user' => $this->user
            ]
        ];
    }
}
