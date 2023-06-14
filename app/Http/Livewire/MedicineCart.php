<?php

namespace App\Http\Livewire;

use App\Models\Medicine;
use Livewire\Component;

use function PHPUnit\Framework\isEmpty;

class MedicineCart extends Component
{

    public $obat;
    public $qty;
    public $ix;
    public $prescription;
    public $obat_name;
    public $obat_qty;
    public $obat_list;
    public $qty_list;
    public $indexing;

    // public $obj;


    public function mount(){
        $this->ix;
        $this->obat=[];
        $this->obat_name=[];
        $this->qty=[];
        $this->prescription=[];
        $this->obat_list = '';
        $this->qty_list = '';
        $this->indexing = 0;
    }

    public function tostring(){
        $this->obat_list = '';
            $this->qty_list = '';
        if ($this->obat && $this->qty && count($this->obat) === count($this->qty) && !empty($this->obat) && !empty($this->qty)) {
            foreach ($this->obat as $index => $o) {
                $this->obat_list .= $o . ',';
                $this->qty_list .= $this->qty[$index] . ',';
            }
        }

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
        array_push($this->qty,0);
        $this->updateParentData();
    }

    public function updateParentData(){
        $this->tostring();
        $this->emit('objectsUpdated', ['obat'=>$this->obat,'qty'=>$this->qty,'listobat'=>$this->obat_list,'listqty' => $this->qty_list] );
    }

    public function render()
    {
        return view('livewire.medicine-cart');
    }
}

