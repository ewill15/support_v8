<?php

namespace App\Http\Resources;

use App\Models\Helper;
use App\Http\Resources\UserNTResource;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
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
            'name' => $this->service->name,
            'month' => $this->month->name,
            'year' => $this->year,
            'amount' => $this->amount,
            'user' => new UserNTResource($this->user),
            'created_at' => Helper::get_database_date($this->created_at),
            'updated_at' => Helper::get_database_date($this->updated_at)
        ];

        return $response;
    }
}
