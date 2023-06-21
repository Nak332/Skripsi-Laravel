<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\TransactionDetails;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    public function index()
    {
    	$transaksi = Transaction::all();
    	return view('', ['transaksi' => $transaksi]);
    }

    public function transaksi($id)
    {
        $transaksi = Transaction::find($id);
        $detil = TransactionDetails::where('transaction_id',$id)->get();
    	return view('transaksi.transaksi', compact(['transaksi','detil']));

    }

    public function insert(Request $request)
    {
        $transaksi = new Transaction;
        $transaksi->patient_id = $request->patient_id;
        $transaksi->appointment_id = $request->appointment_id;
        $transaksi->employee_id = $request->employee_id;
        $transaksi->rekamMedis_id = $request->rekamMedis_id;
        $transaksi->payment = $request->payment;
        $transaksi->save();

        return redirect('/daftar-transaksi');
    }

    public function update(Request $request, $id)
    {
        $transaksi = Transaction::find($id);
        $transaksiDetail = new TransactionDetails;
        $transaksi->update([
            'payment' => $request->payment,
            'flag' => '2'
        ]);
        $transaksiDetail->transaction_id = $id;
        $transaksiDetail->extra_medicine = $request->extra_medicine;
        $transaksiDetail->price = $request->price;
        $transaksiDetail->save();

        return redirect('/daftar-transaksi');
    }
}
