<?php

namespace App\Http\Livewire;

use App\Models\Patient;
use Livewire\Component;

class TambahAntrianModal extends Component
{   
    public $test_data = ['john','james','jake'];
    public $selected_patient;
    public $selected_patient_name;


    public function render()
    {
        return view('livewire.tambah-antrian-modal');
    }

    protected $listeners = [
        'patientSelected' => 'addPatient',
    ];

    public function addPatient($id)
    {
        // Update the parentData property with the received data
        $this->selected_patient=Patient::findorFail($id);
        $this->selected_patient_name=  $this->selected_patient['patient_name'];
    }
}
