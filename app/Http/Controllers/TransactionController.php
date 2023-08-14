<?php

namespace App\Http\Controllers;

use App\Models\MedicineDetail;
use App\Models\Transaction;
use App\Models\TransactionDetails;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;

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
        $detil = TransactionDetails::where('transaction_id',$id)->get();

        $bisadilakukan = 0;
        foreach ($detil as $ids=>$transaction) {
            if ($transaction->medicine_id) {
                $totalobat = 0;
                $obatkedua = MedicineDetail::where('medicine_id', $transaction->medicine_id)->get();
                        foreach ($obatkedua as $obat => $total) {
                            if ($total->medicine_expired_date > Carbon::now()) {
                                $totalobat += $total->medicine_stock;
                            }
                        }
                        if ($totalobat >= $transaction->quantity) {
                            $bisadilakukan = 1;
                        }
                        else{
                            $bisadilakukan = 2;
                        }
            }
        }

        if ($bisadilakukan == 2) {
            Alert::toast('Obat yang dimasukkan tidak cukup dalam stock', 'error');
            return back();
        }

            if ($bisadilakukan == 1) {
                foreach ($detil as $ids=>$transaction) {
                    if ($transaction->medicine_id) {
                        $obat = MedicineDetail::where('medicine_id', $transaction->medicine_id)->orderBy('medicine_expired_date')->first();
                        if ($obat->medicine_stock < $transaction->quantity || $obat->medicine_expired_date <= Carbon::now()) {
                            $obatkedua = MedicineDetail::where('medicine_id', $transaction->medicine_id)->orderBy('medicine_expired_date')->get();
                                $obatyangdijual = $transaction->quantity;
                                foreach ($obatkedua as $obat => $total) {
                                    if ($total->medicine_expired_date > Carbon::now() && $obatyangdijual != '0') {
                                        if ($total->medicine_stock < $obatyangdijual) {
                                            Log::alert('sekarang =' . $obatyangdijual);
                                            $obatyangdijual-= $total->medicine_stock;
                                            $total->delete();
                                            Log::alert('sisa =' . $obatyangdijual);
                                        }
                                        else{
                                            Log::alert('sekarang2 =' . $obatyangdijual);
                                            $totalobatsekarang = $total->medicine_stock - $obatyangdijual;
                                            $total->update([
                                                'medicine_stock' => $totalobatsekarang
                                            ]);
                                            $obatyangdijual = '0';
                                            Log::alert('sisa2 =' . $obatyangdijual);
                                        }
                                    }
                                }
                        } else {
                            $kuantitassekarang = $obat->medicine_stock - $transaction->quantity;
                            $obat->update([
                                'medicine_stock' => $kuantitassekarang
                            ]);
                        }
                    }
                }

            }

            $transaksi = Transaction::find($id);
            $transaksi->update([
                    'employee_id' => $request->employee_id,
                    'payment' => $request->payment,
                    'flag' => '2',
                    'total' => $request->total
                ]);


        return redirect('/daftar-transaksi');
    }

    public function delete($id)
    {
        $transaksi = Transaction::find($id);
        $transaksi->delete();

        return redirect('/daftar-transaksi');
    }
}
