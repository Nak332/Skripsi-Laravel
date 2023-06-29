<?php

namespace App\Http\Livewire;

use App\Models\Patient;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class TambahTransaksi extends ModalComponent
{
    public $selected_patient;
    public $selected_patient_name;
    public $selected_type="medicine_purchase";
    protected $listeners = [
        'patientSelected' => 'addPatient',
    ];

    public function addPatient($id)
    {
        // Update the parentData property with the received data
        $this->selected_patient=Patient::findorFail($id);
        $this->selected_patient_name=  $this->selected_patient['patient_name'];
    }
    public function render()
    {
        return view('livewire.tambah-transaksi');
    }
}
