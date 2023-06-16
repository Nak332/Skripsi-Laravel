<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class PreRekamMedisForm extends ModalComponent
{
    public $patient;
    

    public function render()
    {
        return view('livewire.resepsi-component.pre-rekam-medis-form');
    }
}
