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
        'refreshComponent' => '$refresh'
    ];

    public function undo($id){
        $this->appointment = Appointment::find($id);
        $antsebelum = Appointment::where('status', '3')->orderBy('updated_at')->first();
        if ($antsebelum != NULL) {
            $antsebelum->update([
                'status' => '2',
            ]);
            $this->appointment->update([
                'status' => '1',
            ]);
            $b = $antsebelum->patient_id;
            $this->current_patient = Patient::where('id',$b)->first();
            $this->q_number = $this->appointment->antrian_number;
        }else {
            $this->appointment->update([
                'status' => '1',
            ]);
            // $b = $this->appointment->patient_id;
            // $this->current_patient = Patient::where('id',$b)->first();
            // $this->q_number = $this->appointment->antrian_number;
        }


        // $antrian_sebelumnya = $this->appointment->antrian_number-1;
        // $antsebelum = Appointment::where('antrian_number', $antrian_sebelumnya)->first();
        // $antsebelum->update([
        //     'status' => '3',
        // ]);
        Log::alert("jalan");
    }

    public function setCurrent($id){
        $this->appointment = Appointment::find($id);
        $b = $this->appointment->patient_id;
        $this->current_patient = Patient::where('id',$b)->first();
        $this->q_number = $this->appointment->antrian_number;
        $antsebelum = Appointment::where('status', '2')->first();
        if ($antsebelum != NULL && $antsebelum->id != $id) {
            $antsebelum->update([
                'status' => '3',
            ]);
        }

        $this->appointment->update([
            'status' => '2',
        ]);

        // $antrian_sebelumnya = $this->appointment->antrian_number-1;
        // $antsebelum = Appointment::where('antrian_number', $antrian_sebelumnya)->first();
        // $antsebelum->update([
        //     'status' => '3',
        // ]);
        Log::alert("jalan");
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
