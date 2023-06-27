<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\RekamMedis;
use App\Models\Vaksin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;

class PatientController extends Controller
{
    public function index()
    {

    	$patients = Patient::all();
      return view('resepsi',compact('patients'));

    }

    public function patient($id)
    {
    	$patient = Patient::find($id);
        $RekamMedis = RekamMedis::where('patient_id', $id)->orderByDesc('id')->get();
        $Vaksin = Vaksin::where('patient_id', $id)->orderByDesc('id')->get();
        if (request()->segment(count(request()->segments())) == 'edit') {
            return view('edit-patient', compact(['patient']));
        } else {
            return view('pasien', compact(['patient','RekamMedis','Vaksin']));
        }



    }


    public function insert(Request $request)
    {

        $validate = Validator::make($request->all(), [
            'patient_name' => 'required|max:50|regex:/^[a-zA-Z\s]+$/',
            'patient_gender' => 'required',
            'patient_phone' => 'required|numeric',
            'patient_address'=> 'required',
            'patient_NIK' => 'nullable|digits:16',
            'patient_alias' => 'nullable',
            'patient_DOB' => 'required|date_format:Y-m-d',
            'patient_POB' => 'required',
            'patient_marital_status' => 'required',
            'patient_emergency_contact_name' => 'nullable',
            'patient_emergency_contact_phone' => 'nullable'
            ],[
                'patient_name'=> 'Nama harus diisi',
                'patient_name.max' => 'Maksimal 50 huruf',
                'patient_name.regex' => 'Nama hanya boleh berisikan alfabet',
                'patient_gender' => 'Jenis kelamin harus diisi',
                'patient_phone' => 'Nomor telepon harus diisi',
                'patient_phone' => 'Nomor telepon hanya boleh berisi angka',
                'patient_address' => 'Alamat harus diisi',
                'patient_NIK.digits' => 'NIK harus sesuai 16 digit',
                'patient_NIK.numeric' => 'NIK hanya berisi angka',
                'patient_DOB' => 'Tanggal lahir harus diisi',
                'patient_POB' => 'Tempat lahir harus diisi',
                'patient_marital_status' => 'Status perkawinan harus diisi'
            ]);

            if($validate->fails()){
                return redirect()
                    ->back()
                    ->withErrors($validate)
                    ->withInput()
                    ->with('submitted', true)
                ;
            }
    

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
        $patient->has_BPJS = $request->has_BPJS;
        $patient->save();
        Alert::toast('Sukses menambahkan pasien ' . $request->patient_name.' !', 'success');
        return redirect('/');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'patient_name' => 'required|max:50|regex:/^[a-zA-Z\s]+$/',
            'patient_gender' => 'required',
            'patient_phone' => 'required',
            'patient_address'=> 'required',
            'patient_alias' => 'nullable',
            'patient_DOB' => 'required|date_format:Y-m-d',
            'patient_POB' => 'required',
            'patient_marital_status' => 'required',
            'patient_emergency_contact_name' => 'nullable',
            'patient_emergency_contact_phone' => 'nullable'
            ],[
                'patient_name'=> 'Nama harus diisi',
                'patient_name.max' => 'Maksimal 50 huruf',
                'patient_name.regex' => 'Nama hanya boleh berisikan alfabet',
                'patient_gender' => 'Jenis kelamin harus diisi',
                'patient_phone' => 'Nomor telepon harus diisi',
                'patient_address' => 'Alamat harus diisi',
                'patient_DOB' => 'Tanggal lahir harus diisi',
                'patient_POB' => 'Tempat lahir harus diisi',
                'patient_marital_status' => 'Status perkawinan harus diisi',
            ]);

        $patientUpdate = Patient::findOrFail($id);
        Log::alert($patientUpdate);
        $patientUpdate->update([
        'patient_name' => $request->patient_name,
        'patient_gender' => $request->patient_gender,
        'patient_phone' => $request->patient_phone,
        'patient_address'=> $request->patient_address,
        'patient_alias' => $request->patient_alias,
        'patient_DOB' => $request->patient_DOB,
        'patient_POB' => $request->patient_POB,
        'patient_marital_status' => $request->patient_marital_status,
        'patient_emergency_contact_name' => $request->patient_emergency_contact_name,
        'patient_emergency_contact_phone' => $request->patient_emergency_contact_phone,
        'has_BPJS' => $request->has_BPJS
        ]);
        Alert::toast('Sukses mengedit pasien ' . $request->patient_name.' !', 'success');
        return redirect('/');
    }

    public function delete($id)
{
    $patientDelete = Patient::findOrFail($id);
    $patientDelete->delete();

	return redirect()->back();
}
}
