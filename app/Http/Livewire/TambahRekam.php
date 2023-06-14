<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\RekamMedis;
use Livewire\Component;

class TambahRekam extends Component
{

    public $selected_patient;
    public $selected_patient_name;
    public $patients=[];
    public $rekam;
    public $check;
    public $q_number;
    public $obat=[];
    public $qty=[];


    protected $rules=[
        'patients'=>'required'
    ];

    public function getFromQueue(){
        $p =  Appointment::where('status','2')->first();
        if(!$p){
            $this->check = 'false';
            return;
        }
        $this->selected_patient = Patient::findorFail($p->patient_id);
        $this->selected_patient_name=  $this->selected_patient['patient_name'];
        $this->q_number = $p->id;

    }

    public function clear(){
        $this->selected_patient_name='';
        $this->selected_patient='';
    }

    protected $listeners = [
        'patientSelected' => 'addPatient',
        'objectsUpdated' => 'updateMedicines'
    ];

    public function render()
    {
        return view('livewire.tambah-rekam');
    }

    public function addPatient($id)
    {
        // Update the parentData property with the received data
        $this->q_number=-1;
        $this->selected_patient=Patient::findorFail($id);
        $this->selected_patient_name=  $this->selected_patient['patient_name'];
    }

    public function updateMedicines($data){
        $this->obat = $data['obat'];
        $this->qty  = $data['obat'];
    }
}
