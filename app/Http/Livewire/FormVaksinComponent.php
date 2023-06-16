<?php

namespace App\Http\Livewire;

use App\Models\Patient;
use Livewire\Component;

class FormVaksinComponent extends Component
{
    public $selected_patient;
    public $selected_patient_name;

    public $penyakit =[
        "BCG",
        "Cacar Air (Varicela)",
        "Campak / MR (Morbili Rubela)",
        "Campak, Gondongan, & Rubela (MMR)",
        "Dengue",
        "Difteri, Tetanus & Pertusis (DTP)",
        "Hepatitis A",
        "Hepatitis A",
        "Hib",
        "HPV",
        "HV",
        "Influenza",
        "Japanese Encepphalitis (JE)",
        "Meningitis Meningkokal",
        "Pneumokokus (IPD)",
        "Polio",
        "Rabies",
        "Rotavirus",
        "Tdap/TD",
        "Tifoid",
        "Typhoid",
        "Yellow Fever / Demam Kuning",
        "Zoster"
    ];

    protected $listeners = [
        'patientSelected' => 'addPatient',
    ];


    public function addPatient($id)
    {
        // Update the parentData property with the received data

        $this->selected_patient=Patient::findorFail($id);
        $this->selected_patient_name= $this->selected_patient['patient_name'];
    }
    
    public function render()
    {
        return view('livewire.rekam-vaksin-component.form-vaksin-component');
    }
}
