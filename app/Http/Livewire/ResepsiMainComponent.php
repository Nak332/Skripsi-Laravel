<?php

namespace App\Http\Livewire;

use App\Models\Patient;
use Livewire\Component;

class ResepsiMainComponent extends Component
{
    public $history;
    public $antrian;
    public Patient $current_patient;
    public $q_number;

    protected $listeners = [
        'patientBumped' => 'setCurrent',
    ];

    public function setCurrent($id){
        $this->current_patient = Patient::find($id);
        $this->q_number = $id;
    }
    

    public function render()
    {
        return view('livewire.resepsi.resepsi-main-component');
    }
}
