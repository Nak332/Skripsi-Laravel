<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Patient;

class PatientSearchBar extends Component
{
    public $patients = [];
    public $query;
    public $selected_patient;
    public $patient;
    public $highlightIndex;

    public function updatedQuery(){
        $this->patient = Patient::where('patient_name','like','%'.$this->query.'%')
        ->get()
        ->toArray();
    }


     
    // public function reset()
    // {
    //     $this->query = '';
    //     $this->contacts = [];
    //     $this->highlightIndex = 0;
    // }
 
    public function mount()
    {
        $this->query='';
        $this->patient=[];

    }
 
 
    // public function updatedQuery()
    // {
    //     $this->contacts = Contact::where('name', 'like', '%' . $this->query . '%')
    //         ->get()
    //         ->toArray();
    // }
 

    public function render()
    {
        return view('livewire.patient-search-bar');
    }
    
}
