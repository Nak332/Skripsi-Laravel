<?php

namespace App\Http\Livewire;

use App\Models\Medicine;
use App\Models\Transaction;
use App\Models\TransactionDetails;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Redirect;
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
    public $medicine_purchase=false;

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


        // ------------------------------------------------------------ Transaction Mounting
        if($this->medicine_purchase!=false){
            $cart_items = TransactionDetails::where('transaction_id',$this->medicine_purchase)->whereNotNull('medicine_id')->get();
            foreach($cart_items as $index => $o){
                $medicine_id = $cart_items[$index]->medicine_id;
                
                $qty = $cart_items[$index]->quantity;
                $dose = $cart_items[$index]->dosis;
                $type = $cart_items[$index]->konsumsi;
                $this->importMedicine($medicine_id,$qty,$dose,$type);
            }

        }
        else if($this->transact_rekam){
            Log::alert( $this->transact_rekam. 'Ini med purch');
            // -----------------------------Cek kalo pernah diubah transaction Detailnya ( Beda dari dalem RekamMedis)
            
            if(($transact_id=$this->checkDetailWithRekam())!=false){

                $cart_items = TransactionDetails::where('transaction_id',$transact_id->id)->whereNotNull('medicine_id')->get();
                foreach($cart_items as $index => $o){
                    $medicine_id = $cart_items[$index]->medicine_id;
                    Log::alert( $medicine_id . 'Ini masuk tidak?');
                    $qty = $cart_items[$index]->quantity;
                    $dose = $cart_items[$index]->dosis;
                    $type = $cart_items[$index]->konsumsi;
                    $this->importMedicine($medicine_id,$qty,$dose,$type);
                }
            }
            else if ($this->checkDetailWithRekam() == false) {
                ##Ambil Data dari Rekam Medis kedalem cart
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


            ##Ambil Data dari Rekam Medis kedalem cart
            // $obat = explode(',', $this->transact_rekam->medicine_id);
            // $quantity = explode(',', $this->transact_rekam->quantity);
            // $konsumsi = explode(',', $this->transact_rekam->konsumsi);
            // $dosis = explode(',', $this->transact_rekam->dosis);
            // foreach ($obat as $index => $o) {
            //     if ($o != NULL) {
            //         $medicine_id = $o;
            //         $qty = $quantity[$index];
            //         $dose = $dosis[$index];
            //         $type = $konsumsi[$index];
            //         $this->importMedicine($medicine_id,$qty,$dose,$type);
            //     }
            // }
        }
    }

    ##cek kalo transaction detailnya udah pernah diubah
    public function checkDetailWithRekam(){
        if($this->transact_rekam){
            $rekam_count = count(explode(',', $this->transact_rekam->medicine_id));

            $rekam_transaction = Transaction::where('rekamMedis_id',$this->transact_rekam->id)->first();
            $transaction_details = TransactionDetails::where('transaction_id',$rekam_transaction['id'])->whereNotNull('medicine_id')->get();
            #Cek Jumlah Obat
            if($rekam_count != count($transaction_details)){
                Log::alert('Masuk count');
                return $rekam_transaction;
            }
            #Cek konten obat
            else{
                Log::alert('Masuk else');
                $obat = explode(',', $this->transact_rekam->medicine_id);
                $quantity = explode(',', $this->transact_rekam->quantity);
                $konsumsi = explode(',', $this->transact_rekam->konsumsi);
                $dosis = explode(',', $this->transact_rekam->dosis);
                foreach ($obat as $index => $o) {
                    Log::alert($o);
                    Log::alert($transaction_details[$index]->medicine_id);
                    Log::alert($dosis[$index]);
                    Log::alert($transaction_details[$index]->dosis);
                    Log::alert($konsumsi[$index]);
                    Log::alert($transaction_details[$index]->konsumsi);
                    Log::alert($quantity[$index]);
                    Log::alert($transaction_details[$index]->quantity);
                    if ($o != NULL) {
                        if($o != $transaction_details[$index]->medicine_id or $dosis[$index] != $transaction_details[$index]->dosis or $konsumsi[$index] != $transaction_details[$index]->konsumsi or $quantity[$index] != $transaction_details[$index]->quantity){
                            return $rekam_transaction;
                        }
                        return false;
                    }

                }
            }
        }
    }

    public function wireChangeDataTransaction (){
        $this->tostring();
        Log::alert("jalan2");
        $this->emit('MedicineCartUpdate', ['listobat'=>$this->obat_list,'listqty' => $this->qty_list,'konsumsilist' => $this->consump_type_list, 'dosislist' => $this->dose_list] );
        Log::alert("jalan");
        // $this->emit('MedicineCartRefresh');
        // sleep(1);
        // return redirect(request()->header('Referer'));
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
            $last = array_key_last($this->obat);
            foreach ($this->obat as $index => $o) {
                if ($index != $last) {
                    $this->obat_list .= $o . ',';
                    $this->qty_list .= $this->qty[$index] . ',';
                    $this->dose_list .= $this->obat_dose[$index] . ',';
                    $this->consump_type_list .= $this->obat_consump_type[$index] . ',';
                }
                else{
                    $this->obat_list .= $o;
                    $this->qty_list .= $this->qty[$index];
                    $this->dose_list .= $this->obat_dose[$index];
                    $this->consump_type_list .= $this->obat_consump_type[$index];
                }

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

