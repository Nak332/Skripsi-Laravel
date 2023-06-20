<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class PreRekamMedisForm extends ModalComponent
{
    public $patient;
    public $isipasien;

    public function mount(){
        $this->isipasien = Appointment::where('id', $this->patient)->first();
    }


    public function render()
    {
        return view('livewire.resepsi-component.pre-rekam-medis-form');
    }
}
