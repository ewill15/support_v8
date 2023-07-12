<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class PasanakuResource extends JsonResource
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
            'date_start' => Carbon::parse($this->date_start)->format('d-m-Y'),
            'date_next' => Carbon::parse($this->date_next)->format('d-m-Y'),
            'date_end' => Carbon::parse($this->date_end)->format('d-m-Y'),
            'amount_total' =>$this->amount_total,
            'participant_total'=>$this->participant_total,
            'description'=>$this->description,
            'created_at' => Carbon::parse($this->created_at)->format('d-m-Y'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d-m-Y')
        ];

        return $response;
    }
}
