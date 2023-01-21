<?php

namespace App\Http\Resources;

use App\Models\Helper;
use Illuminate\Http\Resources\Json\JsonResource;

class UserNTResource extends JsonResource
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
            'role_id'=>$this->role->name,
            'created_at' => Helper::get_database_date($this->created_at),
            'updated_at' => Helper::get_database_date($this->updated_at)
        ];

        return $response;
    }
}
