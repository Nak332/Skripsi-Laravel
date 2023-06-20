<?php

namespace App\Http\Livewire;

use App\Models\Patient;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class AntrianList extends Component
{
    public $patients=[];
    public $antrian=[];
    public $history=[];
    public $current_patient=[];
    public $q_type;

    protected $rules=[
        'patients'=>'required'
    ];

    public function render()
    {
        return view('livewire.resepsi-component.antrian-list');
    }

    public function mount($antrian,$history)
    {

        $this->antrian = $antrian;
        $this->history = $history;
    }

    public function getPatientDetails($id){
        $this->current_patient = Patient::find($id);
    }

    public function sendPatientToParentComponent($id)
    {
        // Update the childData property

        // Update the parentData property in the parent component
        $this->emitUp('patientBumped', $id);
    }

    public function sendFirstPatientToComponent($id)
    {
        // Update the childData property

        // Update the parentData property in the parent component

        Log::alert("message");
        $this->emitUp('FirstPatient',$id);
    }
}
