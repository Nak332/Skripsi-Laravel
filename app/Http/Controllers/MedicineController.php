<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\MedicineDetail;
use Illuminate\Http\Request;

class MedicineController extends Controller
{
    public function index()
    {

    	$medicine = Medicine::all();
      return view('daftar-obat',compact('medicine'));

    }

    public function medicines($id)
    {
    	$medicine = Medicine::find($id);
        $medicineDetail = MedicineDetail::where('medicine_id', $id)->get();
    	return view('obat', compact(['medicine','medicineDetail']));

    }


    public function insert(Request $request)
    {
        $medicine = new Medicine;
        $medicine->medicine_name = $request->medicine_name;
        $medicine->medicine_description = $request->medicine_description;
        $medicine->medicine_price = $request->medicine_price;
        $medicine->save();
        $medicineDetail = new MedicineDetail;
        $medicineDetail->medicine_id = $medicine->id;
        $medicineDetail->medicine_stock = $request->medicine_stock;
        $medicineDetail->medicine_expired_date = $request->medicine_expired_date;
        $medicineDetail->save();
        return redirect('/');
    }

    public function update(Request $request, $id)
    {
        $medicineUpdate = Medicine::findOrFail($id);
        $medicineUpdate->update([
        'medicine_name' => $request->medicine_name,
        'medicine_description' => $request->medicine_description,
        'medicine_price' => $request->medicine_price
        ]);
        return redirect('/');
    }

    public function delete($id)
{
    $medicineDelete = Medicine::findOrFail($id);
    $medicineDelete->delete();
    $medicineDetailDelete = MedicineDetail::where('medicine_id',$id);
    $medicineDetailDelete->delete();

	return redirect('/');
}
}
