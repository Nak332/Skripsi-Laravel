<?php

namespace App\Http\Livewire;

use App\Models\Patient;
use Livewire\Component;

class TambahAntrianModal extends Component
{   
    public $test_data = ['john','james','jake'];
    public $patients=[];

    public function render()
    {
        return view('livewire.tambah-antrian-modal');
    }
}
