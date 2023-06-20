<?php

namespace App\Http\Controllers;

use App\Models\MedicineDetail;
use Illuminate\Http\Request;

class MedicineDetailController extends Controller
{
    public function insert(Request $request)
    {
        $request->validate([
            'medicine_stock' =>'required',
            'medicine_expired_date' =>'required',
        ]);

        $obat = MedicineDetail::where('medicine_expired_date',$request->medicine_expired_date)->first();

        if ($obat == NULL) {
        $medicineDetail = new MedicineDetail;
        $medicineDetail->medicine_id = $request->medicine_id;
        $medicineDetail->medicine_stock = $request->medicine_stock;
        $medicineDetail->medicine_expired_date = $request->medicine_expired_date;
        $medicineDetail->save();
        } else {
            $jumlahsekarang = $obat->medicine_stock;
            $obat->update([
                'medicine_stock' => $request->medicine_stock + $jumlahsekarang
            ]);
        }



        return redirect()->back();
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'medicine_stock' =>'required',
            'medicine_expired_date' =>'required',
        ]);
        $medicineUpdate = MedicineDetail::findOrFail($id);
        $medicineUpdate->update([
        'medicine_id' => $request->medicine_id,
        'medicine_stock' => $request->medicine_stock,
        'medicine_expired_date' => $request->medicine_expired_date
        ]);
        return back();
    }

    public function delete($id)
    {
        $medicineDelete = MedicineDetail::find($id);
        $medicineDelete->delete();

        return redirect()->back();
    }
}
