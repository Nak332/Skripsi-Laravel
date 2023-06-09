<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\RekamMedis;
use Illuminate\Http\Request;

class RekamController extends Controller
{
    public function index()
    {
    	$rekamMedis = RekamMedis::all();
    	return view('resepsi', ['rekamMedis' => $rekamMedis]);
    }

    public function Rekam($id)
    {
        $rekamMedis = Patient::find($id);
    	return view('tambah-rekam-medis-page', compact(['rekamMedis']));

    }

    public function insert(Request $request)
    {
        $rekamMedis = new RekamMedis;
        $rekamMedis->patient_id = $request->patient_id;
        $rekamMedis->appointment_id = $request->appointment_id;
        $rekamMedis->medicine_id = $request->medicine_id;
        $rekamMedis->employee_id = $request->employee_id;
        $rekamMedis->body_temperature = $request->body_temperature;
        $rekamMedis->sistol = $request->sistol;
        $rekamMedis->diastol = $request->diastol;
        $rekamMedis->symptoms = $request->symptoms;
        $rekamMedis->complaint = $request->complaint;
        $rekamMedis->anamnesis = $request->anamnesis;
        $rekamMedis->follow_up_plan = $request->follow_up_plan;
        $rekamMedis->treatment = $request->treatment;
        $rekamMedis->past_service = $request->past_service;
        $rekamMedis->agreement = $request->agreement;
        $rekamMedis->diagnosis = $request->diagnosis;
        $rekamMedis->total_price = $request->total_price;
        $rekamMedis->type = $request->type;
        $rekamMedis->note = $request->note;
        $rekamMedis->flag = $request->flag;
        $rekamMedis->icd10 = $request->icd10;
        $rekamMedis->save();

        return redirect('/');
    }

    public function update(Request $request, $id)
{
    $rekamMedisUpdate = RekamMedis::findOrFail($id);
    $rekamMedisUpdate->update([
        'patient_id' => $request->patient_id,
        'appointment_id' => $request->appointment_id,
        'medicine_id' => $request->medicine_id,
        'employee_id' => $request->employee_id,
        'symptoms' => $request->symptoms,
        'complaint' => $request->complaint,
        'anamnesis' => $request->anamnesis,
        'follow_up_plan' => $request->follow_up_plan,
        'treatment' => $request->treatment,
        'past_service' => $request->past_service,
        'agreement' => $request->agreement,
        'diagnosis' => $request->diagnosis,
        'total_price' => $request->total_price,
        'type' => $request->type,
        'note' => $request->note,
        'flag' => $request->flag,
        'icd10' => $request->icd10
    ]);
	return redirect('/');
}

public function delete($id)
{
    $rekamMedisDelete = RekamMedis::findOrFail($id);
    $rekamMedisDelete->delete();

	return redirect('/');
}


}
