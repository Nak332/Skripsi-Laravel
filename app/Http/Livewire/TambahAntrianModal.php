<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TambahAntrianModal extends Component
{   
    public $test_data = ['john','james','jake'];
    public $selected_patient;

    public function render()
    {
        return view('livewire.tambah-antrian-modal');
    }

    protected $listeners = [
        'selected_patientUpdated' => 'updateselected_patient',
    ];

    public function updateselected_patient($data)
    {
        // Update the parentData property with the received data
        $this->sync('selected_patient',$data);
    }
}
