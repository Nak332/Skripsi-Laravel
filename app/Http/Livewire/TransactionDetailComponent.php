<?php

namespace App\Http\Livewire;

use App\Models\Medicine;
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
    public $dosis;
    public $konsumsi;
    public $treatment;
    public $extra_medicine;
    public $totalqty = [];
    public $medicineprice= [];
    public $totalharga;

    protected $rules=[
        'detil.*.price'=>'required',
        'detil.*.quantity'=>'required',
        'detil.*.extra_medicine' => 'required',
        'detil.*.dosis'=>'required',
        'detil.*.konsumsi'=>'required',
    ];

    public function mount(){
        if ($this->transaksi->rekamMedis_id) {
            $this->rekammedis = RekamMedis::find($this->transaksi->rekamMedis_id);
        }
    }

    protected $listeners = ['MedicineCartUpdate' => 'UpdateTransactionDetail','MedicineCartRefresh' => '$refresh'];


    ##IMPORT DARI REKAM MEDIS
    public function UpdateTransactionDetail($data){
        // Log::alert('masuk');
        $detil = TransactionDetails::where('transaction_id',$this->transaksi->id)->whereNotNull('medicine_id')->get();
        // Log::alert($detil . 'ini adalah' . gettype($detil));
        $listobat1 = $data['listobat'];
        // Log::alert($listobat1 . 'ini adalah1' . gettype($listobat1));
        $listobat = explode(',', $listobat1);
        // Log::alert(print_r($listobat) . ' ini listobat' . count($listobat));
        $listqty_temp = $data['listqty'];
        $listqty = explode(',',$listqty_temp);
        // Log::alert(print_r($listqty) . ' ini listqty');
        $konsumsilist_temp= $data['konsumsilist'];
        $konsumsilist = explode(',',$konsumsilist_temp);
        $dosislist_temp = $data['dosislist'];
        $dosislist = explode(',',$dosislist_temp);
        // Log::alert(print_r($dosislist) . ' ini dosislist');
        Log::alert('masuk2');

        if ($detil->first()) {
            foreach ($detil as $o) {
                $o->delete();
            }
        }

        if ($listobat) {
            foreach ($listobat as $index => $o) {
                // Log::alert("berjalan");
                    $transaksibaru = new TransactionDetails;
                    $transaksibaru->transaction_id = $this->transaksi->id;
                    $transaksibaru->medicine_id = $o;
                    $medicineprice = Medicine::find($o);
                    if ($medicineprice) {
                        $transaksibaru->price = $medicineprice->medicine_price;
                    $transaksibaru->quantity = $listqty[$index];
                    $transaksibaru->konsumsi = $konsumsilist[$index];
                    $transaksibaru->dosis = $dosislist[$index];
                    $transaksibaru->save();
                    } else {
                        return redirect(request()->header('Referer'));
                    }


            }
        }


        return redirect(request()->header('Referer'));
        Log::alert("keluar");
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
        return redirect(request()->header('Referer'));
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
        return redirect(request()->header('Referer'));
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
        return redirect(request()->header('Referer'));
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

    public function SetKonsumsi($id){
        $transaction = TransactionDetails::find($id);
        // $transaction->price = $this->konsul;
        $this->konsumsi = $transaction->konsumsi;
    }

    public function UpdateKonsumsi($id, $konsumsi){
        $transaction = TransactionDetails::find($id);
        // $transaction->price = $this->treatment;
        $transaction->update([
            'konsumsi' => $konsumsi
        ]);
    }

    public function SetDosis($id){
        $transaction = TransactionDetails::find($id);
        // $transaction->price = $this->konsul;
        $this->dosis = $transaction->dosis;
    }

    public function UpdateDosis($id, $dosis){
        $transaction = TransactionDetails::find($id);
        // $transaction->price = $this->treatment;
        $transaction->update([
            'dosis' => $dosis
        ]);
    }

    public function SetTotal($id){
        $transaction = TransactionDetails::where('Transaction_id', $id)->get();
        if ($transaction->first()) {
            foreach ($transaction as $price) {
                if ($price->quantity) {
                    $pricebenar = $price->price * $price->quantity;
                $this->totalharga += $pricebenar;
                }
                else {
                    $pricebenar = $price->price;
                $this->totalharga += $pricebenar;
                }
            }
        }
    }


    public function render()
    {
        return view('livewire.transaction-detail-component');
    }
}
