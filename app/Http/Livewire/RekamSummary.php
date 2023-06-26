<?php

namespace App\Http\Livewire;

use App\Models\RekamMedis;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class RekamSummary extends ModalComponent
{
    public $selected_patient;
    public $Rekam;
    public $RekamAll;
    public $index = 0;
    public $limit =0;

    
    public function mount(){
        if(RekamMedis::where('patient_id',$this->selected_patient)->count() > 0){
            $this->RekamAll = RekamMedis::where('patient_id',$this->selected_patient)->get();
        
        $this->Rekam = $this->RekamAll[$this->index];
        $this->limit = RekamMedis::where('patient_id',$this->selected_patient)->count() -1 ;
        }
        
    }

    public function next(){
        if($this->index == $this->limit){
            return;
        }
        
        $this->index++;
        $this->Rekam = $this->RekamAll[$this->index];
       
        
    }

    public function prev(){
        if($this->index==0){
            return;
        }
        $this->index--;
        $this->Rekam = $this->RekamAll[$this->index];
    }

    public function render()
    {
        return view('livewire.rekam-vaksin-component.rekam-summary');
    }
}
