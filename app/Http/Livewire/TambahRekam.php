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
    public $listobat = '';
    public $listqty ='';
    public $rujukan = false;
    public $antrian;
    public $complaint;
    public $body_temperature;
    public $blood_sugar;
    public $height;
    public $weight;
    public $sistol;
    public $diastol;
    public $pulse;


    protected $rules=[
        'patients'=>'required'
    ];

    public function getFromQueue(){
        $p =  Appointment::where('status','2')->first();
        if(!$p){
            $this->check = 'false';
            return;
        }
        $this->antrian = $p;
        $this->complaint = $p->complaint;
        $this->body_temperature =$p->body_temperature;
        $this->blood_sugar = $p->blood_sugar;
        $this->height = $p->height;
        $this->weight = $p->weight;
        $this->sistol = $p->sistol;
        $this->diastol = $p->diastol;
        $this->pulse = $p->pulse;
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
        'objectsUpdated' => 'updateMedicines',
        'testValueUpdated' => 'updateTests'
    ];

    public function updateTests($data){
        $this->complaint = $data['complaint'];
        $this->body_temperature =$data['body_temperature'];
        $this->blood_sugar = $data['blood_sugar'];
        $this->height = $data['height'];
        $this->weight = $data['weight'];
        $this->sistol = $data['sistol'];
        $this->diastol = $data['diastol'];
        $this->pulse = $data['pulse'];
    }
    public function addPatient($id)
    {
        // Update the parentData property with the received data
        $this->q_number=-1;
        $this->selected_patient=Patient::findorFail($id);
        $this->selected_patient_name=  $this->selected_patient['patient_name'];
    }
    
    public function toggle()
    {
        $this->rujukan = !$this->rujukan;
    }

    public function updateMedicines($data){
        $this->obat = $data['obat'];
        $this->qty  = $data['qty'];
        $this->listqty = $data ['listqty'];
        $this->listobat = $data['listobat'];
    }

    
    public function render()
    {
        return view('livewire.rekam-vaksin-component.tambah-rekam');
    }
}
