<?php

namespace App\Http\Livewire;

use Livewire\Component;



class MedicineCart extends Component
{

    public $obat;
    public $qty;
    public $ix;
    public $prescription;
    
    

    public function mount(){
        $this->ix=1;
        $this->obat=[];
        $this->qty=[];
        $this->prescription=[];
    }

    public function add($i){
        $this->ix = $i + 1;
        array_push($this->prescription,$i);
    }

    public function remove($i)
    {
        unset($this->obat[$i]);
        unset($this->qty[$i]);
        
        // Re-index the arrays to remove any gaps
        $this->obat = array_values($this->obat);
        $this->qty = array_values($this->qty);
    }

    protected $listeners = ['medicineSent' => 'getMedicine'];

    public function getMedicine($data){
        $obat = $data['obat'];
        array_push($this->obat, $obat);
    }

    public function render()
    {
        return view('livewire.medicine-cart');
    }
}    
 
