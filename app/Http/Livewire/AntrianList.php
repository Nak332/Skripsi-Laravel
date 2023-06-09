<?php

namespace App\Http\Livewire;

use App\Models\Patient;
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
        return view('livewire.antrian-list');
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
}
