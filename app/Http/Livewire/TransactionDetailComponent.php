<?php

namespace App\Http\Livewire;

use App\Models\RekamMedis;
use App\Models\TransactionDetails;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class TransactionDetailComponent extends Component
{
    public $transaksi;
    public $detil;
    public $rekammedis;
    public $konsul;
    public $treatment;
    public $extra_medicine;
    public $totalqty = [];
    public $medicineprice= [];

    protected $rules=[
        'detil.*.price'=>'required',
        'detil.*.quantity'=>'required',
        'detil.*.extra_medicine' => 'required'
    ];

    public function mount(){
        if ($this->transaksi->rekamMedis_id) {
            $this->rekammedis = RekamMedis::find($this->transaksi->rekamMedis_id);
        }
    }

    protected $listeners = ['MedicineCartUpdate' => 'UpdateTransactionDetail'];


    ##IMPORT DARI REKAM MEDIS
    public function UpdateTransactionDetail($data){
        // Log::alert('masuk');
        $detil = TransactionDetails::where('transaction_id',$this->transaksi->id)->whereNotNull('medicine_id')->get();
        // Log::alert($detil . 'ini adalah' . gettype($detil));
        $listobat1 = $data['listobat'];
        // Log::alert($listobat1 . 'ini adalah1' . gettype($listobat1));
        $listobat = explode(',', $listobat1);
        $listqty_temp = $data['listqty'];
        $listqty = explode(',',$listqty_temp);
        $konsumsilist_temp= $data['konsumsilist'];
        $konsumsilist = explode(',',$konsumsilist_temp);
        $dosislist_temp = $data['dosislist'];
        $dosislist = explode(',',$dosislist_temp);
        // Log::alert('masuk2');

        if ($detil->first()) {
            foreach ($detil as $o) {
                $o->delete();
            }
        }

        foreach ($listobat as $index => $o) {
            // Log::alert("berjalan");
            $transaksibaru = new TransactionDetails;
            $transaksibaru->transaction_id = $this->transaksi->id;
            $transaksibaru->medicine_id = $o;
            $transaksibaru->quantity = $listqty[$index];
            $transaksibaru->konsumsi = $konsumsilist[$index];
            $transaksibaru->dosis = $dosislist[$index];
            $transaksibaru->save();
        }

        // Log::alert("keluar");
    }

    public function SetKonsul($id){
        $transaction = TransactionDetails::find($id);
        // $transaction->price = $this->konsul;
        $this->konsul = $transaction->price;
    }

    public function UpdateKonsul($id){
        $transaction = TransactionDetails::find($id);
        // $transaction->price = $this->konsul;
        $transaction->update([
            'price' => $this->konsul
        ]);
    }

    public function SetTreatment($id){
        $transaction = TransactionDetails::find($id);
        // $transaction->price = $this->konsul;
        $this->treatment = $transaction->price;
    }

    public function UpdateTreatment($id){
        $transaction = TransactionDetails::find($id);
        // $transaction->price = $this->treatment;
        $transaction->update([
            'price' => $this->treatment
        ]);
    }

    public function SetExtra($id){
        $transaction = TransactionDetails::find($id);
        // $transaction->price = $this->konsul;
        $this->extra_medicine = $transaction->extra_medicine;
    }

    public function UpdateExtra($id){
        $transaction = TransactionDetails::find($id);
        // $transaction->price = $this->treatment;
        $transaction->update([
            'extra_medicine' => $this->extra_medicine
        ]);
    }

    public function SetMedicinePrice($id){
        $transaction = TransactionDetails::find($id);
        // $transaction->price = $this->konsul;
        $this->medicineprice = $transaction->price;
    }

    public function UpdateMedicinePrice($id, $price){
        $transaction = TransactionDetails::find($id);
        // $transaction->price = $this->treatment;
        $transaction->update([
            'price' => $price
        ]);
    }

    public function SetQuantity($id){
        $transaction = TransactionDetails::find($id);
        // $transaction->price = $this->konsul;
        $this->totalqty = $transaction->quantity;
    }

    public function UpdateQuantity($id, $qty){
        $transaction = TransactionDetails::find($id);
        // $transaction->price = $this->treatment;
        $transaction->update([
            'quantity' => $qty
        ]);
    }


    public function render()
    {
        return view('livewire.transaction-detail-component');
    }
}
