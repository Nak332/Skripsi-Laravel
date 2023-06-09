<?php

namespace App\Http\Livewire;

use Livewire\Component;

class QItems extends Component
{
    public $q;

    
    public function render()
    {
        return view('livewire.q-items');
    }
}
