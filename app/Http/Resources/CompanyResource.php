<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class CompanyResource extends JsonResource
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
            'name' => $this->name,
            'address' => $this->address,
            'type'=>$this->type?$this->type:'',
            'phone'=>$this->phone,
            'area'=>$this->area?$this->area:'',
            'nit'=>$this->nit,
            'created_at' => Helper::get_database_date($this->created_at),
            'updated_at' => Helper::get_database_date($this->updated_at)
        ];

        return $response;
    }
}
