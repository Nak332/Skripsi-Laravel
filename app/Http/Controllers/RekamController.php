<?php

namespace App\Http\Controllers;

use App\Models\RekamMedis;
use Illuminate\Http\Request;

class RekamController extends Controller
{
    public function index()
    {
    	$rekamMedis = RekamMedis::all();
    	return view('resepsi', ['rekamMedis' => $rekamMedis]);

    }

    public function insert(Request $request)
    {
        $rekamMedis = new RekamMedis;
        $rekamMedis->patient_id = $request->patient_id;
        $rekamMedis->appointment_id = $request->appointment_id;
        $rekamMedis->medicine_id = $request->medicine_id;
        $rekamMedis->employee_id = $request->employee_id;
        $rekamMedis->symptoms = $request->symptoms;
        $rekamMedis->keluhan = $request->keluhan;
        $rekamMedis->hasil_anamnesis = $request->hasil_anamnesis;
        $rekamMedis->penatalaksanaan = $request->penatalaksanaan;
        $rekamMedis->odontogram_klinik = $request->odontogram_klinik;
        $rekamMedis->tindakan = $request->tindakan;
        $rekamMedis->layanan_sebelumnya = $request->layanan_sebelumnya;
        $rekamMedis->persetujuan = $request->persetujuan;
        $rekamMedis->disease = $request->disease;
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
        'keluhan' => $request->keluhan,
        'hasil_anamnesis' => $request->hasil_anamnesis,
        'penatalaksanaan' => $request->penatalaksanaan,
        'odontogram_klinik' => $request->odontogram_klinik,
        'tindakan' => $request->tindakan,
        'layanan_sebelumnya' => $request->layanan_sebelumnya,
        'persetujuan' => $request->persetujuan,
        'disease' => $request->disease,
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
