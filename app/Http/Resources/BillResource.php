<?php

namespace App\Http\Resources;

use App\Models\Helper;
use Illuminate\Http\Resources\Json\JsonResource;

class BillResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $company_array = [
            'name'=>$this->company->name,
            'nit'=>$this->company->nit
        ];

        $user_array = [
            'full_name'=> $this->user->fullname,
            'email'=>$this->user->email            
        ];

        $resource = [
            "id" => $this->id,
            'invoice_number'=>$this->invoice_number,
            'control_code'=>$this->control_code,
            'date'=>Helper::get_database_date($this->date,false),
            'description'=>$this->description,
            'price'=>$this->price,
            'company'=>$company_array,
            'user'=>$user_array,
            'created_at' => Helper::get_database_date($this->created_at),
            'updated_at' => Helper::get_database_date($this->updated_at)
        ];
        return $resource;
    }
}
