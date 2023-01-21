<?php

namespace App\Http\Resources;

use App\Models\Helper;
use Illuminate\Http\Resources\Json\JsonResource;

class BillCodeResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $resource = [
            "id" => $this->id,
            'invoice_number'=>$this->invoice_number,
            'control_code'=>$this->control_code,
            'date'=>Helper::get_database_date($this->date,false),
            'description'=>$this->description,
            'price'=>$this->price,
            'company_id'=>$this->company_id,
            'user_id'=>$this->user_id,
            'created_at' => Helper::get_database_date($this->created_at),
            'updated_at' => Helper::get_database_date($this->updated_at)
        ];
        return $resource;
    }
}
