<?php

namespace App\Http\Controllers;

use App\Models\TransactionDetails;
use Illuminate\Http\Request;

class TransactionDetailController extends Controller
{
    public function index()
    {
    	$transaksi = TransactionDetails::all();
    	return view('', ['transaksi' => $transaksi]);
    }

    public function Rekam($id)
    {
        $transaksi = TransactionDetails::find($id);
    	return view('', compact(['transaksi']));

    }

    public function insert(Request $request)
    {
        $transaksi = new TransactionDetails;
        $transaksi->transaction_id = $request->transaction_id;
        $transaksi->treatment = $request->treatment;
        $transaksi->medicine_id = $request->medicine_id;
        $transaksi->quantity = $request->quantity;
        $transaksi->price = $request->price;
        $transaksi->save();

        return redirect('/');
    }
}
