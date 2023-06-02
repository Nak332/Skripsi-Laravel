<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Patient;

class PatientSearchBar extends Component
{
    public $patients = []; //Unused, isinya semua patients dari previous page
    public $query; //Query Searchbar
    public $selected_patient; //pasien yang terpilih
    public $patient; //Untuk Dropdown rekomendasi
    public $highlightIndex;
    public $test='halo';
    public $selected_patient_name;

    public function updatedQuery(){
        $this->patient = Patient::where('patient_name','like','%'.$this->query.'%')
        ->get()
        ->toArray();
    }

    public function selectPatient($id){
        $this->selected_patient = Patient::findorFail($id);
        $this->selected_patient_name = $this->selected_patient['patient_name'];

    }

    public function setQuery($incoming_query){
        $this->query = $incoming_query;
    }

     
    // public function reset()
    // {
    //     $this->query = '';
    //     $this->contacts = [];
    
    // }
 
    public function mount()
    {
        $this->query='';
        $this->patient=[];

    }
    public function change_test(){
        $this->test = 'Hai';
    }
 
 
 

    public function render()
    {
        return view('livewire.patient-search-bar');
    }
    
}
