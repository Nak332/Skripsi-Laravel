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
        $transaksi->flag = '1';
        $transaksi->save();

        if ($request->treatment != 'medicine_purchase') {
            $detiltransaksi = new TransactionDetails;
            $detiltransaksi->transaction_id = $transaksi->id;
            $detiltransaksi->treatment = $request->treatment;
            $detiltransaksi->save();
        }



        return redirect()->route('to.transaction', ['id' => $transaksi->id]);
        // return redirect('/');
    }

    public function update(Request $request, $id)
    {
        $transaksi = Transaction::find($id);
        $transaksi->update([
            'payment' => $request->payment,
            'flag' => '2',
            'total' => $request->total
        ]);

        return redirect('/daftar-transaksi');
    }
}
