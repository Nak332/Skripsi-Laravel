<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class AntrianController extends Controller
{
    public $nomor = 1;

    public function index()
    {
    	$antrian = Appointment::all();
    	return view('resepsi', ['antrian' => $antrian]);
    }

    public function insert(Request $request)
    {
        $lastappointment = Appointment::latest()->get();
        $lastdate = strtotime($lastappointment->created_at);
        $last = date($lastdate, 'd');
        $today = Carbon::now();

        $antrian = new Appointment;
        $antrian->patient_id = $request->patient_id;
        $antrian->employee_id = $request->employee_id;
        $antrian->appointment_type = $request->appointment_type;
        if ($last != $today->day) {
            $this->nomor = 1;
            $antrian->antrian_number = $this->nomor;
            $this->nomor= $this->nomor + 1;
        } else {
            $antrian->antrian_number = $this->nomor;
            $this->nomor= $this->nomor + 1;
        }

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
