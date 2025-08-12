<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Carbon\Carbon;

class ReportFullResource extends JsonResource
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
            'in' => $this->ingreso,
            'out' => $this->gasto,
            'total' => $this->total,
            'prendas' =>$this->prendas,
            'created_at' => Carbon::parse($this->created_at)->format('d-m-Y'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d-m-Y')
        ];

        return $response;
    }
}
