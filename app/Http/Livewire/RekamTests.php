<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class RekamTests extends ModalComponent
{
    public function render()
    {
        return view('livewire.rekam-vaksin-component.rekam-tests');
    }
}
