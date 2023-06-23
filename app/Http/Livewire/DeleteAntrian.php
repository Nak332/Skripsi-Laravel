<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

use App\Models\Appointment;

class DeleteAntrian extends ModalComponent
{
    public $antrian;
    public $antrianNow;

    public function render()
    {
        return view('livewire.resepsi-component.delete-antrian');
    }



    public function mount(){
        $this->antrianNow = Appointment::where('id', $this->antrian)->first();
    }

}
