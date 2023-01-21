<?php

namespace App\Http\Resources;

use App\Models\Helper;
use App\Http\Resources\RestaurantResource;
use Illuminate\Http\Resources\Json\JsonResource;

class DishResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $response = [
            'id' => $this->id,
            'name' => $this->name,
            'picture' => $this->picture,
            'description' => $this->description,
            'price' => $this->price,
            'available'=>$this->available,
            'restaurant' => new RestaurantResource($this->restaurant),
            'created_at' => Helper::get_database_date($this->created_at),
            'updated_at' => Helper::get_database_date($this->updated_at)
        ];

        return $response;
    }
}
