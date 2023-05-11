<?php

namespace App\Http\Resources\V1;

use Illuminate\Http\Resources\Json\JsonResource;

class AppointmentResource extends JsonResource
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
            'patient_id' => $this->patient_id,
            'patientN_name' => $this->whenLoaded('patient', function () {
                return $this->patient->patientName;
            }),
            'status' => $this->status,
            'date' => $this->appointmentDate,
            'id'=> $this->id
            
        ];
    }
}
