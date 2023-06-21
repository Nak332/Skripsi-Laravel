<?php

namespace App\Http\Controllers;

use App\Models\Vaksin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use RealRashid\SweetAlert\Facades\Alert;

class VaksinController extends Controller
{
    public function index()
    {
        $vaksin = Vaksin::all();
        return view('vaksin',compact('vaksin'));

    }

    public function Vaksin($id)
    {
        $Vaksin = Vaksin::find($id);
    	return view('form-vaksin', compact(['Vaksin']));

    }


    public function insert(Request $request)
    {
        $today = Date::now()->format('Y-m-d');
        $request->validate([
            'vaccine_name' => 'required',
            'jenis_vaksin' => 'required',
            'vaccination_date' => 'required',
            'patient_id' => 'required',
            'batch_number' => 'required',
            'expired_date' => 'required',
            'supplier' => 'required',
            'notes' => 'nullable',
            'next_dose' => ['nullable','date_format:Y-m-d','after:'.$today]
            ],[
            'vaccine_name' => 'Nama vaksin harus diisi',
            'jenis_vaksin' => 'Jenis vaksin harus diisi',
            'vaccine_date' => 'Tanggal vaksin harus diisi',
            'expired_date' => 'Tanggal Kadaluarsa harus diisi',
            'patient_id' => 'Pasien harus diisi',
            'batch_number' => 'Nomor batch vaksin harus diisi',
            'supplier' => 'Supplier harus diisi',
            'next_dose.after' => 'Tanggal dosis berikut harus melewati hari ini'
            ]);

        $vaksin = new Vaksin;
        $vaksin->employee_id = $request->employee_id;
        $vaksin->vaccine_name = $request->vaccine_name;
        $vaksin->vaccination_date = $request->vaccination_date;
        $vaksin->patient_id = $request->patient_id;
        $vaksin->batch_number = $request->batch_number;
        $vaksin->jenis_vaksin = $request->jenis_vaksin;
        $vaksin->register_number = $request->register_number;
        $vaksin->supplier = $request->supplier;
        $vaksin->expired_date = $request->expired_date;
        $vaksin->notes = $request->notes;
        $vaksin->next_dose = $request->next_dose;
        $vaksin->save();
        Alert::toast('Sukses menambahkan riwayat vaksin!', 'success');
        return redirect('/resepsi');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'vaccine_name' => 'required',
            'vaccine_date' => 'required',
            'patient_id' => 'required',
            'batch_number' => 'nullable',
            'notes' => 'nullable',
            'next_dose' => 'nullable'
            ]);


        $vaksinUpdate = vaksin::findOrFail($id);
        $vaksinUpdate->update([
            'employee_id' => $request->employee_id,
            'vaccine_name' => $request->vaccine_name,
            'vaccine_date' => $request->vaccination_date,
            'patient_id' => $request->patient_id,
            'jenis_vaksin' => $request->jenis_vaksin,
            'register_number' => $request->register_number,
            'supplier' => $request->supplier,
            'expired_date' => $request->expired_date,
            'batch_number' => $request->batch_number,
            'notes' => $request->notes,
            'next_dose' => $request->next_dose
        ]);
        return redirect('/');
    }


}
