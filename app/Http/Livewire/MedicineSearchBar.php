<?php

namespace App\Http\Livewire;

use App\Models\Medicine;
use App\Models\MedicineDetail;
use Livewire\Component;

class MedicineSearchBar extends Component
{

    public $patients = []; //Unused, isinya semua patients dari previous page
    public $query; //Query Searchbar
    public $selected_medicine; //pasien yang terpilih
    public $medicines; //Untuk Dropdown rekomendasi
    public $highlightIndex;
    public $selected_patient_name;

    public function updatedQuery(){
        $this->medicines= Medicine::where('medicine_name','like','%'.$this->query.'%')
        ->get()
        ->toArray();
    }

    public function clear(){
        $this->query='';
        $this->selected_patient_name='';
        $this->selected_medicine='';
    }


    public function addMedicine($id,$qty){
        $this->selected_medicine= Medicine::findorFail($id);
        $this->selected_patient_name = $this->selected_patient['patient_name'];
        $this->sendPatientToParentComponent($id,$qty);

    }

    public function setQuery($incoming_query){
        $this->query = $incoming_query;
    }

    public function sendPatientToParentComponent($id,$qty)
    {
        $this->emitUp('patientSelected', [$id,$qty]);
 
 
    }
     

 
    public function mount()
    {
        $this->query='';
        $this->medicines=[];

    }

    
    public function render()
    {
        return view('livewire.medicine-search-bar');    
    }
}
