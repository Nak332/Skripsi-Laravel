<?php

namespace App\Http\Controllers;

use App\Events\antrianDelete;
use App\Events\AppointmentHistoryCreated;
use App\Models\Appointment;
use App\Models\AppointmentHistory;
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
        $history = AppointmentHistory::whereDate('created_at',  Carbon::today()->toDateString())->get();
    	return view('resepsi', compact(['antrian','history']));
    
    }

    public function insert(Request $request)
    {
        $lastappointment = Appointment::OrderBy('id','desc')->first();
        if ($lastappointment != null){
            $nilai = $lastappointment->antrian_number;
            $lastdate = strtotime($lastappointment->created_at->format('Y-m-d'));
            $last = date('j',$lastdate);
            Log::info('terakhir' . $last);
            $nilai = $lastappointment->antrian_number;
        }
        else{
            $last = 0;
        }
        $today = Carbon::now();

        Log::info('sekarang' . $today->day);



        $antrian = new Appointment;

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
        if ($request->appointment_type == 'on_the_spot') {
            $antrian->appointment_date = $today;
        } else {
            $antrian->appointment_date = $request->appointment_date;
        }


        $antrian->save();

        event(new AppointmentHistoryCreated($antrian));

        Log::info('sekarang' . $antrian->id);
        return redirect('/resepsi');
    }

    public function update(Request $request, $id)
{
    $antrianUpdate = Appointment::findOrFail($id);
    $antrianUpdate->update([
        // 'patient_id' => $request->patient_id,
        // 'employee_id' => $request->employee_id,
        'complaint' => $request->complaint,
        // 'appointment_type' => $request->appointment_type,
        // 'status' => $request->status,
        // 'appointment_date' => $request->date,
        'blood_sugar' => $request->blood_sugar,
        'pulse' => $request->pulse,
        'sistol' => $request->sistol,
        'diastol' => $request->diastol,
        'body_temperature' => $request->body_temperature,
        'weight' => $request->weight,
        'height' => $request->height
    ]);
	return redirect('/resepsi');
}

public function delete($id)
{


    $antrianDelete = Appointment::findOrFail($id);
    event(new antrianDelete($antrianDelete));
    $antrianDelete->delete();

	return redirect()->back();
}



}
