<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AntrianController extends Controller
{


    public function index()
    {
    	$antrianView = Appointment::orderBy('antrian_number')->get();
    	return view('/', compact('antrianView'));

    }

    public function insert(Request $request)
    {
        $antrian = new Appointment;
        $antrian->patient_id = $request->patient_id;
        $antrian->employee_id = $request->employee_id;
        $antrian->appointment_type = $request->appointment_type;
        $antrian->keluhan = $request->keluhan;
        $antrian->status = $request->status;
        $antrian->appointment_date = $request->date;
        $antrian->save();

        return redirect('/');
    }

    public function update(Request $request, $id)
{
    $antrianUpdate = Appointment::findOrFail($id);
    $antrianUpdate->update([
        'patient_id' => $request->patient_id,
        'employee_id' => $request->employee_id,
        'keluhan' => $request->keluhan,
        'appointment_type' => $request->appointment_type,
        'status' => $request->status,
        'appointment_date' => $request->date
    ]);
	return redirect('/');
}

public function delete($id)
{
    $antrianDelete = Appointment::findOrFail($id);
    $antrianDelete->delete();

	return redirect('/');
}



}
