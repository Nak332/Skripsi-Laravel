<?php

namespace App\Listeners;

use App\Events\CreateTransaction;
use App\Models\Medicine;
use App\Models\Transaction;
use App\Models\TransactionDetails;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class TransactionCreated
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\CreateTransaction  $event
     * @return void
     */
    public function handle(CreateTransaction $event)
    {
        $rekammedis = $event->rekam;
        $transaction = new Transaction;


        $transaction->patient_id = $rekammedis->patient_id;
        $transaction->rekamMedis_id = $rekammedis->id;
        $transaction->appointment_id = $rekammedis->appointment_id;
        $transaction->flag = '1';
        $transaction->save();

        $transactiondetail = new TransactionDetails;
        $transactiondetail->transaction_id = $transaction->id;
        $transactiondetail->konsultasi = '1';
        $transactiondetail->save();

        $transactiondetail = new TransactionDetails;
        $transactiondetail->transaction_id = $transaction->id;
        $transactiondetail->treatment = $rekammedis->treatment;
        $transactiondetail->save();

        $obat = explode(',', $rekammedis->medicine_id);
        $qty = explode(',', $rekammedis->quantity);
        $konsumsi = explode(',', $rekammedis->konsumsi);
        $dosis = explode(',', $rekammedis->dosis);
        foreach ($obat as $index => $o) {
            if ($o != NULL) {
                $transactiondetail = new TransactionDetails;
                $transactiondetail->transaction_id = $transaction->id;
                $transactiondetail->medicine_id = $o;
                $transactiondetail->quantity = $qty[$index];
                $transactiondetail->konsumsi = $konsumsi[$index];
                $transactiondetail->dosis = $dosis[$index];
                $harga = Medicine::where('id', $o)->first();
                $transactiondetail->price = $harga->medicine_price;

                $transactiondetail->save();
            }

        }

    }
}
