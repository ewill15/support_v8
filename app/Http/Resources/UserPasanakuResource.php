<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UserPasanakuResource extends JsonResource
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
            'user' => $this->user->full_name,
            'pasanaku' =>$this->pasanaku->name,
            'pasanaku_id'=>$this->pasanaku_id,
            // 'amount'=>$this->penalty_amount,
            // 'description'=>$this->penalty_description,
            'created_at' => Carbon::parse($this->created_at)->format('d-m-Y'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d-m-Y')
        ];

        return $response;
    }
}
