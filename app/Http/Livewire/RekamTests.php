<?php

namespace App\Http\Livewire;

use App\Http\Controllers\AntrianController;
use App\Models\Appointment;
use Livewire\Component;
use LivewireUI\Modal\ModalComponent;

class RekamTests extends ModalComponent
{

    public $antrian;
    public $complaint;
    public $body_temperature;
    public $blood_sugar;
    public $height;
    public $weight;
    public $sistol;
    public $diastol;
    public $pulse;

    public function mount(){
        if($this->antrian){
            $this->complaint = $this->antrian['complaint'];
            $this->body_temperature = $this->antrian['body_temperature'];
            $this->blood_sugar = $this->antrian['blood_sugar'];
            $this->height = $this->antrian['height'];
            $this->weight = $this->antrian['weight'];
            $this->sistol = $this->antrian['sistol'];
            $this->diastol = $this->antrian['diastol'];
            $this->pulse = $this->antrian['pulse'];
        }

    }

    public function updateFormValues(){
        if($this->antrian){
            $target= Appointment::find($this->antrian['id']);
            
            $target->update([
                
                    'complaint'=>$this->complaint,
                    'body_temperature'=>$this->body_temperature,
                    'blood_sugar'=>$this->blood_sugar,
                    'height'=>$this->height,
                    'weight'=>$this->weight,
                    'sistol'=>$this->sistol,
                    'diastol'=>$this->diastol,
                    'pulse'=>$this->pulse                
            ]);
            $this->closeModal();
            
        }
        $this->emit('testValueUpdated',[
            'complaint'=>$this->complaint,
            'body_temperature'=>$this->body_temperature,
            'blood_sugar'=>$this->blood_sugar,
            'height'=>$this->height,
            'weight'=>$this->weight,
            'sistol'=>$this->sistol,
            'diastol'=>$this->diastol,
            'pulse'=>$this->pulse   ]);
            $this->closeModal();
        

    }

    
    public function render()
    {
        return view('livewire.rekam-vaksin-component.rekam-tests');
    }
}
