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
        $lastappointment = Appointment::OrderBy('id','desc')->first();
        $lastdate = strtotime($lastappointment->created_at->format('Y-m-d'));
        $last = date('d',$lastdate);
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
        $antrian->status = '1';
        $antrian->appointment_date = $today;
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
