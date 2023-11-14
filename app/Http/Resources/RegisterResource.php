<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class RegisterResource extends JsonResource
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
            'type' => $this->type,
            'url' => $this->url,
            'page' => $this->page,
            'username' => $this->username,
            'password' => $this->hash_password,
            'count_password' => $this->count_password,
            'status' => $this->status,
            'date' => Carbon::parse($this->date)->format('d-m-Y'),
            'description' => $this->description,
            'last_use' => $this->last_use,
            'created_at' => Carbon::parse($this->created_at)->format('d-m-Y'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d-m-Y')
        ];

        return $response;
    }
}
