<?php

/*
    Author: Miguel Jaramillo
*/

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TravelResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->getTitle(),
            'description' => $this->getDescription(),
            'place' => $this->getPlace(),
            'date_of_destination' => $this->getDateOfDestination(),
            'price' => $this->getPrice(),
            'start_date' => $this->getStartDate(),
            'end_date' => $this->getEndDate(),
        ];
    }
}