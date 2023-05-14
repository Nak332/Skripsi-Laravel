<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AntrianController extends Controller
{


    public function index()
    {
    	$antrianview = Appointment::orderBy('antrian_number')->get();
    	return view('/', compact('antrianview'));

    }

    public function insert(Request $request)
    {
        $antrian = new Appointment;
        $antrian->patient_id = $request->patient_id;
        $antrian->employee_id = $request->employee_id;
        $antrian->appointment_type = $request->appointment_type;
        $antrian->status = $request->status;
        $antrian->appointment_date = $request->date;
        $antrian->save();

        return redirect('/');
    }

    public function update(Request $request, $id)
{
    $AntrianUpdate = Appointment::findOrFail($id);
    $AntrianUpdate->update([
        'patient_id' => $request->patient_id,
        'employee_id' => $request->employee_id,
        'appointment_type' => $request->appointment_type,
        'status' => $request->status,
        'appointment_date' => $request->date
    ]);
	return redirect('/');
}

public function delete($id)
{
    $AntrianDelete = Appointment::findOrFail($id);
    $AntrianDelete->delete();

	return redirect('/');
}



}
