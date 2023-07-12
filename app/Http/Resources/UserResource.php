<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            "id" => $this->id,
            'first_name' => $this->first_name,
            'last_name' =>$this->last_name,
            'full_name'=>$this->full_name,
            'email'=>$this->email,
            'cellphone'=>$this->cellphone,
            'role'=>$this->role,
            'dob'=>Carbon::parse($this->dob)->format('d-m'),
            'created_at' => Carbon::parse($this->created_at)->format('d-m-Y'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d-m-Y')
        ];

        return $response;
    }
}
