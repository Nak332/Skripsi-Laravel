<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\RekamMedis;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    public function index()
    {
<<<<<<< SKS-2-Livewire-Feature-Resepsionis
    	$patients = Patient::all();
      return view('resepsi',compact('patients'));

    }

    public function patient($id)
    {
    	$patient = Patient::find($id);
        $RekamMedis = RekamMedis::where('patient_id', $id)->orderByDesc('id')->get();
    	return view('pasien', compact(['patient','RekamMedis']));

    }


    public function insert(Request $request)
    {
        $patient = new Patient;
        $patient->patient_name = $request->patient_name;
        $patient->patient_gender = $request->patient_gender;
        $patient->patient_phone = $request->patient_phone;
        $patient->patient_address = $request->patient_address;
        $patient->patient_NIK = $request->patient_NIK;
        $patient->patient_alias = $request->patient_alias;
        $patient->patient_DOB = $request->patient_DOB;
        $patient->patient_POB = $request->patient_POB;
        $patient->patient_marital_status = $request->patient_marital_status;
        $patient->patient_emergency_contact_name = $request->patient_emergency_contact_name;
        $patient->patient_emergency_contact_phone = $request->patient_emergency_contact_phone;
        $patient->patient_BPJS = $request->patient_BPJS;
        $patient->save();

        return redirect('/');
    }

    public function update(Request $request, $id)
    {
        $patientUpdate = Patient::findOrFail($id);
        $patientUpdate->update([
        'patient_name' => $request->patient_name,
        'patient_gender' => $request->patient_gender,
        'patient_phone' => $request->patient_phone,
        'patient_address'=> $request->patient_address,
        'patient_NIK' => $request->patient_NIK,
        'patient_alias' => $request->patient_alias,
        'patient_DOB' => $request->patient_DOB,
        'patient_POB' => $request->patient_POB,
        'patient_marital_status' => $request->patient_marital_status,
        'patient_emergency_contact_name' => $request->patient_emergency_contact_name,
        'patient_emergency_contact_phone' => $request->patient_emergency_contact_phone,
        'patient_BPJS' => $request->patient_BPJS
        ]);
        return redirect('/');
    }

    public function delete($id)
{
    $patientDelete = Patient::findOrFail($id);
    $patientDelete->delete();

	return redirect('/');
}
}
