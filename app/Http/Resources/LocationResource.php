<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class LocationResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id'=> $this->id,
            'practice_id' => $this->practice_id,
            'practiceLocationStatus' =>  $this->practice_location_status,
            'userId' => $this->user_id,
            'name' => $this->name,
            'npiCode' => $this->npi_code,
            'address1' => $this->address1,
            'address2' => $this->address2,
            'city' => $this->city,
            'state' => $this->state,
            'zip' => $this->zip,
            




        ];
    }
}
