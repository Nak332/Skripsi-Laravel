<?php

namespace App\Http\Controllers;

use App\Models\MedicineDetail;
use Illuminate\Http\Request;

class MedicineDetailController extends Controller
{
    public function insert(Request $request)
    {
        $medicineDetail = new MedicineDetail;
        $medicineDetail->medicine_id = $request->id;
        $medicineDetail->medicine_stock = $request->medicine_stock;
        $medicineDetail->medicine_expired_date = $request->medicine_expired_date;

        return redirect('/');
    }

    public function update(Request $request, $id)
    {
        $medicineUpdate = MedicineDetail::findOrFail($id);
        $medicineUpdate->update([
        'medicine_stock' => $request->medicine_stock,
        'medicine_expired_date' => $request->medicine_expired_date
        ]);
        return redirect('/');
    }

    public function delete($id)
    {
        $medicineDelete = MedicineDetail::findOrFail($id);
        $medicineDelete->delete();

        return redirect('/');
    }
}
