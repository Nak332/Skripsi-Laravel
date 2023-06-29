<?php

namespace App\Http\Livewire;

use App\Models\Medicine;
use Illuminate\Support\Facades\Log;
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
    public $obat_dose;
    public $obat_consump_type;
    public $obat_list;
    public $qty_list;
    public $dose_list;
    public $consump_type_list;
    public $indexing;

    public $transact_rekam;
    // public $obj;


    public function mount(){

        $this->ix;
        $this->obat=[];
        $this->obat_name=[];
        $this->qty=[];
        $this->obat_dose=[];
        $this->obat_consump_type=[];
        $this->prescription=[];
        $this->dose_list='';
        $this->consump_type_list='';
        $this->obat_list = '';
        $this->qty_list = '';
        $this->indexing = 0;
        if($this->transact_rekam){
            $obat = explode(',', $this->transact_rekam->medicine_id);
            $quantity = explode(',', $this->transact_rekam->quantity);
            $konsumsi = explode(',', $this->transact_rekam->konsumsi);
            $dosis = explode(',', $this->transact_rekam->dosis);
            foreach ($obat as $index => $o) {
                if ($o != NULL) {
                    $medicine_id = $o;
                    $qty = $quantity[$index];
                    $dose = $dosis[$index];
                    $type = $konsumsi[$index];
                    $this->importMedicine($medicine_id,$qty,$dose,$type);
                }
            }
        }
    }

    public function wireChangeDataTransaction (){
        $this->tostring();
        Log::alert("jalan2");
        $this->emit('MedicineCartUpdate', ['obat'=>$this->obat,'qty'=>$this->qty,'listobat'=>$this->obat_list,'listqty' => $this->qty_list,'konsumsilist' => $this->consump_type_list, 'dosislist' => $this->dose_list] );
    Log::alert("jalan");
    }

    // public function wireChangeDelete (){
    //     $this->emit('MedicineCartUpdate',[$this->obat_list,$this->qty_list,$this->dose_list,$this->consump_type_list]);
    // }

    ##Buat kalo dari transaksi page, import obat dari data rekam medis
    public function importMedicine($medicine_id,$qty,$dose, $type)
    {
        $obj = Medicine::find($medicine_id);
        $medicineName = $obj ? $obj->medicine_name : null;
        array_push($this->obat_name, $medicineName);
        array_push($this->obat, $medicine_id);
        array_push($this->qty,$qty);
        array_push($this->obat_dose,$dose);
        array_push($this->obat_consump_type,$type);
        $this->updateParentData();
    }

    public function tostring(){
        $this->obat_list = '';
        $this->qty_list = '';
        $this->dose_list = '';
        $this->consump_type_list = '';
        if ($this->obat && $this->qty && count($this->obat) === count($this->qty) && !empty($this->obat) && !empty($this->qty)) {
            foreach ($this->obat as $index => $o) {
                $this->obat_list .= $o . ',';
                $this->qty_list .= $this->qty[$index] . ',';
                $this->dose_list .= $this->obat_dose[$index] . ',';
                $this->consump_type_list .= $this->obat_consump_type[$index] . ',';
            }
        }

    }

    // public function add($i){
    //     $this->ix = $i + 1;
    //     array_push($this->prescription,$i);
    //     array_push($this->qty);
    // }

    public function remove($i)
    {
        unset($this->obat[$i]);
        unset($this->qty[$i]);
        unset($this->obat_name[$i]);
        unset($this->obat_dose[$i]);
        unset($this->obat_consump_type[$i]);

        // Re-index the arrays to remove any gaps
        $this->obat = array_values($this->obat);
        $this->qty = array_values($this->qty);
        $this->obat_name = array_values($this->obat_name);
        $this->obat_dose = array_values($this->obat_dose);
        $this->obat_consump_type = array_values($this->obat_consump_type);
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
        array_push($this->obat_dose,'');
        array_push($this->obat_consump_type,'Kapsul');
        $this->updateParentData();
    }

    public function updateParentData(){
        $this->tostring();
        $this->emit('objectsUpdated', ['obat'=>$this->obat,'qty'=>$this->qty,'listobat'=>$this->obat_list,'listqty' => $this->qty_list,'konsumsilist' => $this->consump_type_list, 'dosislist' => $this->dose_list] );
    }

    public function render()
    {
        return view('livewire.obat-component.medicine-cart');
    }
}

