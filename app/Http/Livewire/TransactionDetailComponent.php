<?php

namespace App\Http\Livewire;

use App\Models\TransactionDetails;
use Illuminate\Support\Facades\Log;
use Livewire\Component;

class TransactionDetailComponent extends Component
{
    public $transaksi;
    public $detil;
    public $konsul;
    public $treatment;
    public $totalqty = [];
    public $medicineprice= [];

    protected $rules=[
        'detil.*.price'=>'required',
        'detil.*.quantity'=>'required'
    ];

    public function SetKonsul($id){
        Log::alert($id.'Messages');
        $transaction = TransactionDetails::find($id);
        // $transaction->price = $this->konsul;
        $this->konsul = $transaction->price;
    }

    public function UpdateKonsul($id){
        Log::alert($id.'Messages');
        $transaction = TransactionDetails::find($id);
        // $transaction->price = $this->konsul;
        $transaction->update([
            'price' => $this->konsul
        ]);
    }

    public function SetTreatment($id){
        Log::alert($id.'Messages');
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

    public function SetMedicinePrice($id){
        Log::alert($id.'Messages');
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
        Log::alert($id.'Messages');
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
