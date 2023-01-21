<?php

namespace App\Http\Resources;

use App\Models\Helper;
use App\Http\Resources\UserNTResource;
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
            'username' => $this->username,
            'page' => $this->page,
            'type' => $this->type,
            'password' => $this->password,
            'old_password'=>$this->old_password,
            'hash_password' => $this->hash_password,
            'date' => Helper::get_database_date($this->date,false),
            'date_old_password' => $this->date_old_password?Helper::get_database_date($this->date_old_password,false):null,
            'description' => $this->description,
            'status' => $this->status,
            'user' => new UserNTResource($this->user),
            'created_at' => Helper::get_database_date($this->created_at),
            'updated_at' => Helper::get_database_date($this->updated_at)
        ];

        return $response;
    }
}
