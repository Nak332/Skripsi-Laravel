<?php

namespace App\Http\Controllers;

use App\Events\antrianUpdateFlag;
use App\Events\CreateTransaction;
use App\Models\Patient;
use App\Models\RekamMedis;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

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
        $request->validate([
            'file_input' => 'nullable|mimetypes:application/pdf,application/msword|max:50000',
            'patient_id' => 'required',
            'appointment_id' => 'nullable',
            'medicine_id' => 'nullable',
            'employee_id' => 'required',
            'anamnesis' => 'required',
            'blood_sugar' => 'nullable',
            'pulse' => 'nullable',
            'follow_up_plan' => 'nullable',
            'treatment' => 'required',
            'past_service' => 'nullable',
            'diagnosis' => 'required',
            'type' => 'nullable',
            'note' => 'nullable'
            ]);

        $rekamMedis = new RekamMedis;
            if ($request->file_input != NULL) {
                $pasien = Patient::find($request->patient_id);
            $file_input= $pasien->patient_name . '_'. $pasien->patient_DOB . '_' .  time() .'.'.$request->file_input->extension();
            $request->file_input->move(public_path('Dokumen'), $file_input);
            $rekamMedis->attachment = $file_input;
            }

        $rekamMedis->patient_id = $request->patient_id;
        $rekamMedis->appointment_id = $request->appointment_id;
        $rekamMedis->medicine_id = $request->medicine_id;
        $rekamMedis->employee_id = $request->employee_id;
        $rekamMedis->body_temperature = $request->body_temperature;
        $rekamMedis->sistol = $request->sistol;
        $rekamMedis->diastol = $request->diastol;
        $rekamMedis->weight -> $request->weight;
        $rekamMedis->height -> $request->heigh;
        $rekamMedis->blood_sugar = $request->blood_sugar;
        $rekamMedis->pulse = $request->pulse;
        $rekamMedis->anamnesis = $request->anamnesis;
        $rekamMedis->quantity = $request->quantity;
        $rekamMedis->follow_up_plan = $request->follow_up_plan;
        $rekamMedis->treatment = $request->treatment;
        $rekamMedis->past_service = $request->past_service;
        $rekamMedis->diagnosis = $request->diagnosis;
        $rekamMedis->type = $request->type;
        $rekamMedis->note = $request->note;
        $rekamMedis->flag = $request->flag;
        $rekamMedis->icd10 = $request->icd10;
        $rekamMedis->save();

        if ($request->appointment_id != NULL) {
            event(new antrianUpdateFlag($rekamMedis));
        }

        event(new CreateTransaction($rekamMedis));

        return redirect('/');
    }

    public function update(Request $request, $id)
{
    $request->validate([
        'file_input' => 'mimetypes:application/pdf,application/msword|max:50000',
        'patient_id' => 'required',
        'appointment_id' => 'nullable',
        'medicine_id' => 'nullable',
        'employee_id' => 'required',
        'blood_sugar' => 'nullable',
        'pulse' => 'nullable',
        'anamnesis' => 'required',
        'follow_up_plan' => 'nullable',
        'treatment' => 'required',
        'past_service' => 'nullable',
        'diagnosis' => 'required',
        'type' => 'nullable',
        'note' => 'nullable',
        ]);

    $rekamMedisUpdate = RekamMedis::findOrFail($id);
    $rekamMedisUpdate->update([
        'patient_id' => $request->patient_id,
        'appointment_id' => $request->appointment_id,
        'medicine_id' => $request->medicine_id,
        'employee_id' => $request->employee_id,
        'blood_sugar' => $request->blood_sugar,
        'pulse' => $request->pulse,
        'weight' => $request->weight,
        'height' => $request->height,
        'anamnesis' => $request->anamnesis,
        'follow_up_plan' => $request->follow_up_plan,
        'quantity' => $request->quantity,
        'treatment' => $request->treatment,
        'past_service' => $request->past_service,
        'diagnosis' => $request->diagnosis,
        'type' => $request->type,
        'note' => $request->note,
        'flag' => $request->flag,
        'icd10' => $request->icd10
    ]);
    if ($request->file_input != NULL) {
        $pasien = Patient::find($request->patient_id);
        $file_input= $pasien->patient_name . '_'. $pasien->patient_DOB . '_' .  time() .'.'.$request->file_input->extension();
        $request->file_input->move(public_path('Dokumen'), $file_input);
        File::delete(public_path('images/' . $rekamMedisUpdate->attachment));
            $rekamMedisUpdate->update([
                'attachment' => $file_input
            ]);
    }

	return redirect('/');
}

public function delete($id)
{
    $rekamMedisDelete = RekamMedis::findOrFail($id);
    $rekamMedisDelete->delete();

	return redirect('/');
}


}
