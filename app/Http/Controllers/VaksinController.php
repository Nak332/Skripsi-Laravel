<?php

namespace App\Http\Controllers;

use App\Models\Vaksin;
use Illuminate\Http\Request;

class VaksinController extends Controller
{
    public function index()
    {
        $vaksin = Vaksin::all();
        return view('vaksin',compact('vaksin'));

    }

    public function Vaksin($id)
    {
        $Vaksin = Vaksin::find($id);
    	return view('form-vaksin', compact(['Vaksin']));

    }


    public function insert(Request $request)
    {
        // $request->validate([
        //     'vaccine_name' => 'required',
        //     'vaccine_date' => 'required',
        //     'patient_id' => 'required',
        //     'batch_number' => 'nullable',
        //     'notes' => 'nullable',
        //     'next_dose' => 'nullable'
        //     ]);

        $vaksin = new Vaksin;
        $vaksin->employee_id = $request->employee_id;
        $vaksin->vaccine_name = $request->vaccine_name;
        $vaksin->vaccination_date = $request->vaccination_date;
        $vaksin->patient_id = $request->patient_id;
        $vaksin->batch_number = $request->batch_number;
        $vaksin->notes = $request->notes;
        $vaksin->next_dose = $request->next_dose;
        $vaksin->save();
        return redirect('/');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'vaccine_name' => 'required',
            'vaccine_date' => 'required',
            'patient_id' => 'required',
            'batch_number' => 'nullable',
            'notes' => 'nullable',
            'next_dose' => 'nullable'
            ]);


        $vaksinUpdate = vaksin::findOrFail($id);
        $vaksinUpdate->update([
            'employee_id' => $request->employee_id,
            'vaccine_name' => $request->vaccine_name,
            'vaccine_date' => $request->vaccination_date,
            'patient_id' => $request->patient_id,
            'batch_number' => $request->batch_number,
            'notes' => $request->notes,
            'next_dose' => $request->next_dose
        ]);
        return redirect('/');
    }

    public function delete($id)
{
    $vaksinDelete = vaksin::findOrFail($id);
    $vaksinDelete->delete();

	return redirect('/');
}
}
