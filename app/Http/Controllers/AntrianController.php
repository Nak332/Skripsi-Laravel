<?php

namespace App\Http\Controllers;

use App\Events\AppointmentHistoryCreated;
use App\Models\Appointment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;



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
        if ($lastappointment != null){
            $lastdate = strtotime($lastappointment->created_at->format('Y-m-d'));
            $last = date('j',$lastdate);
            Log::info('terakhir' . $last);
        }
        else{
            $last = 0;
        }
        $today = Carbon::now();

        Log::info('sekarang' . $today->day);



        $antrian = new Appointment;
        $nilai = $lastappointment->antrian_number;
        $antrian->patient_id = $request->patient_id;
        $antrian->employee_id = $request->employee_id;
        $antrian->appointment_type = $request->appointment_type;
        if ($last != $today->day) {
            DB::table('appointments')->truncate();
            $antrian->antrian_number = '1';
        } else {
            $antrian->antrian_number = $nilai+1;
        }

        $antrian->complaint = $request->complaint;
        $antrian->status = '1';
        $antrian->appointment_date = $today;
        $antrian->save();

        event(new AppointmentHistoryCreated($antrian));

        Log::info('sekarang' . $antrian->id);
        return redirect('/');
    }

    public function update(Request $request, $id)
{
    $antrianUpdate = Appointment::findOrFail($id);
    $antrianUpdate->update([
        'patient_id' => $request->patient_id,
        'employee_id' => $request->employee_id,
        'keluhan' => $request->complaint,
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
