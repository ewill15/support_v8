<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class MachineResource extends JsonResource
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
            'motherboard' => $this->motherboard,
            'processor' => $this->processor,
            'IP' => $this->IP,
            'operative_system' => $this->operative_system,
            'mail_address' => $this->mail_address,
            'office_package' => $this->office_package,
            'other' => $this->other,
            'owner' => $this->owner,
            'created_at' => Carbon::parse($this->created_at)->format('d-m-Y'),
            'updated_at' => Carbon::parse($this->updated_at)->format('d-m-Y')
        ];

        return $response;
    }
}
