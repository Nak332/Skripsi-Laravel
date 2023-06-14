<?php

namespace App\Http\Livewire;

use App\Models\Medicine;
use Livewire\Component;



class MedicineCart extends Component
{

    public $obat;
    public $qty;
    public $ix;
    public $prescription;
    public $obat_name;
    public $obat_qty;
    // public $obj;
    
    

    public function mount(){
        $this->ix;
        $this->obat=[];
        $this->obat_name=[];
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
        unset($this->obat_name[$i]);
        
        // Re-index the arrays to remove any gaps
        $this->obat = array_values($this->obat);
        $this->qty = array_values($this->qty);
        $this->obat_name = array_values($this->obat_name);
        $this->updateParentData();
    }

    public function getMedicineName($id){
        $nama = Medicine::find($id);
        return $nama['medicine_name'];
    }

    protected $listeners = ['medicineSent' => 'getMedicine'];

    public function getMedicine($data)
    {
        $obat = $data['obat'];
        $obj = Medicine::find($data['obat']);
        $medicineName = $obj ? $obj->medicine_name : null;
        array_push($this->obat_name, $medicineName);
        array_push($this->obat, $obat);
        $this->updateParentData();
    }

    public function updateParentData(){
        $this->emit('objectsUpdated', $this->obat, $this->qty);
    }

    public function render()
    {
        return view('livewire.medicine-cart');
    }
}    
 
