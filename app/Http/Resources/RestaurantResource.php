<?php

namespace App\Http\Resources;

use App\Models\Helper;
use App\Http\Resources\UserNTResource;
use Illuminate\Http\Resources\Json\JsonResource;

class RestaurantResource extends JsonResource
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
            'address' => $this->address,
            'phone' => $this->phone,
            'email' => $this->email,
            'open_daytime'=>$this->open_daytime,
            'close_daytime' => $this->close_daytime,
            'user' => new UserNTResource($this->user),
            'created_at' => Helper::get_database_date($this->created_at),
            'updated_at' => Helper::get_database_date($this->updated_at)
        ];

        return $response;
    }
}
