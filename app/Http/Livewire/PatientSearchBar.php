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
    public $selected_patient_name;

    public function updatedQuery(){
        $this->patient = Patient::where('patient_name','like','%'.$this->query.'%')
        ->get()
        ->toArray();
    }

    public function clear(){
        $this->query='';
        $this->selected_patient_name='';
        $this->selected_patient='';
    }



    public function selectPatient($id){
        $this->selected_patient = Patient::findorFail($id);
        $this->selected_patient_name = $this->selected_patient['patient_name'];
        $this->sendPatientToParentComponent($id);

    }

    public function setQuery($incoming_query){
        $this->query = $incoming_query;
    }

    public function sendPatientToParentComponent($id)
    {
        // Update the childData property

        // Update the parentData property in the parent component
        $this->emitUp('patientSelected', $id);
 
 
    }
     

 
    public function mount()
    {
        $this->query='';
        $this->patient=[];

    }

    

    public function render()
    {
        return view('livewire.patient-search-bar');
    }
    
}
