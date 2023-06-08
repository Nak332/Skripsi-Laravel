<?php

namespace App\Http\Livewire;

use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class CardRekammedis extends ModalComponent
{
    public function render()
    {
        return view('livewire.card-rekammedis');
    }

    public static function modalMaxWidth(): string
    { 
    return '7xl';
    }


}
