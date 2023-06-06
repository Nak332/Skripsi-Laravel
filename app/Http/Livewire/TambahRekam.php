<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use App\Models\Patient;
use Livewire\Component;

class TambahRekam extends Component
{

    public $selected_patient;
    public $selected_patient_name;
    public $patients=[];
    public $check = '0';


    protected $rules=[
        'patients'=>'required'
    ];

    public function getFromQueue(){
        $p =  Appointment::OrderBy('id','asc')->first();
        $this->selected_patient = Patient::findorFail($p->patient_id);
        $this->selected_patient_name=  $this->selected_patient['patient_name'];
        
         
    }

    public function clear(){
        $this->selected_patient_name='';
        $this->selected_patient='';
    }
    
    protected $listeners = [
        'patientSelected' => 'addPatient',
    ];

    public function render()
    {
        return view('livewire.tambah-rekam');
    }

    public function addPatient($id)
    {
        // Update the parentData property with the received data
        $this->selected_patient=Patient::findorFail($id);
        $this->selected_patient_name=  $this->selected_patient['patient_name'];
    }
}
