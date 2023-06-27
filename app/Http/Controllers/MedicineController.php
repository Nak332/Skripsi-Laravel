<?php

namespace App\Http\Controllers;

use App\Models\Medicine;
use App\Models\MedicineDetail;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class MedicineController extends Controller
{
    public function index()
    {

    	$medicine = Medicine::all();
      return view('daftar-obat',compact('medicine'));

    }

    public function medicines(Request $request,$id)
    {

        $p = strstr($request->path(),'/',true);
        Log::alert($p);
    	$medicine = Medicine::find($id);
        $medicineDetail = MedicineDetail::where('medicine_id', $id)->orderBy('medicine_expired_date')->get();
        if ($p == 'obat' ) {
            return view('obat', compact(['medicine','medicineDetail']));
        } else {
            return view('edit-obat', compact('medicine'));
        }

    	// $medicine = Medicine::find($id);
        // $medicineDetail = MedicineDetail::where('medicine_id', $id)->orderBy('medicine_expired_date')->get();
    	// return view('obat', compact(['medicine','medicineDetail']));
    }


    public function insert(Request $request)
    {
        $validate = Validator::make($request->all(), [
            'medicine_name' => 'required',
            'medicine_description' =>'required',
            'medicine_price' =>'required',
            'medicine_stock' =>'nullable',
            'medicine_expired_date' =>'nullable'
        ],[
            'medicine_name' => 'Nama obat harus diisi',
            'medicine_description' => 'Keterangan obat perlu diisi',
            'medicine_price' => 'Harga obat perlu diisi'
        ]);

        if($validate->fails()){
            return redirect()
                ->back()
                ->withErrors($validate)
                ->withInput()
                ->with('submitted', true)
            ;
        }
        // $request->validate([
        //     'medicine_name' => 'required',
        //     'medicine_description' =>'required',
        //     'medicine_price' =>'required',
        //     'medicine_stock' =>'nullable',
        //     'medicine_expired_date' =>'nullable'
        // ],[
        //     'medicine_name' => 'Nama obat harus diisi',
        //     'medicine_description' => 'Keterangan obat perlu diisi',
        //     'medicine_price' => 'Harga obat perlu diisi'
        // ]);

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
        Alert::toast('Sukses menambah obat!', 'success');
        return redirect('/daftar-obat')->with('submitted', true);;
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'medicine_name' => 'required',
            'medicine_description' =>'required',
            'medicine_price' =>'required',
        ],[
            'medicine_name' => 'Nama obat harus diisi',
            'medicine_description' => 'Keterangan obat perlu diisi',
            'medicine_price' => 'Harga obat perlu diisi'
        ]);
        $medicineUpdate = Medicine::findOrFail($id);
        $medicineUpdate->update([
        'medicine_name' => $request->medicine_name,
        'medicine_description' => $request->medicine_description,
        'medicine_price' => $request->medicine_price
        ]);
        Alert::toast('Sukses mengedit obat!', 'success');
        return redirect()->route('to.obat', ['id' => $id]);
    }

    public function delete($id)
{
    $medicineDelete = Medicine::findOrFail($id);
    $medicineDelete->delete();
    $medicineDetailDelete = MedicineDetail::where('medicine_id',$id);
    $medicineDetailDelete->delete();
    Alert::toast('Sukses menghapus obat!', 'success');

	return redirect('daftar-obat');
}
}
