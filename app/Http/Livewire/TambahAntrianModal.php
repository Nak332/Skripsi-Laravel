<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TambahAntrianModal extends Component
{   
    public $test_data = ['john','james','jake'];

    public function render()
    {
        return view('livewire.tambah-antrian-modal');
    }
}
