<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class PatientResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'patient_id'=> $this->patient_id,
            'name'=> $this->patientName,
            'current_gender'=>$this->patientGender,
            'phone'=>$this->patientPhone,
            'address'=>$this->patientAddress,

        ];
    }
}
