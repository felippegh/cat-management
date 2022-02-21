<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CatResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->resource->getKey(),
            'name' => $this->resource->name,
            'breed' => $this->resource->breed,
            'description' => $this->resource->description,
            'location_lat' => $this->resource->location_lat,
            'location_lon' => $this->resource->location_lon,
            'birthdate' => $this->resource->birthdate,
        ];
    }
}
