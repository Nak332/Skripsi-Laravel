<?php

namespace App\Http\Livewire;

use App\Models\Appointment;
use App\Models\Patient;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class ResepsiMainComponent extends Component
{
    public $history;
    public $antrian;
    public Patient $current_patient;
    public $q_number;
    public $appointment;

    protected $listeners = [
        'patientBumped' => 'setCurrent',
    ];

    public function setCurrent($id){
        $this->appointment = Appointment::find($id);
        $b = $this->appointment->patient_id;
        $this->current_patient = Patient::where('id',$b)->first();
        $this->q_number = $this->appointment->antrian_number;
        $this->appointment->update([
            'status' => '2',
        ]);
        $antrian_sebelumnya = $this->appointment->antrian_number-1;
        if($antrian_sebelumnya!='0'){
            $antsebelum = Appointment::where('antrian_number', $antrian_sebelumnya)->first();
        $antsebelum->update([
            'status' => '3',
        ]);
        Log::alert("jalan");
        Log::info("idsekarang" . $antrian_sebelumnya);

        }
        
    }


    public function render()
    {

        $this->appointment = Appointment::where('status', '2')->first();
        if ($this->appointment != NULL) {
            return view('livewire.resepsi.resepsi-main-component', $this->appointment);
        }
        else{
            return view('livewire.resepsi.resepsi-main-component');
        }

    }
}
