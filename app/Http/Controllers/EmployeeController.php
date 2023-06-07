<?php

namespace App\Http\Controllers;

use App\Events\EmployeeCreated;
use App\Listeners\CreateUserForEmployee;
use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{
    public function index()
    {
    	$employeeList = Employees::orderBy('Employee_name')->get();
    	return view('/', compact('employeeList'));

    }

    public function employee(Request $request , $id)
    {
        $p = strstr($request->path(),'/',true);
        Log::alert($p);
    	$employee = Employees::find($id);
        if ($p == 'profil' ) {
            return view('employee-profile', compact('employee'));
        } else {
            return view('edit-employee', compact('employee'));
        }




    }

    public function insert(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);



        $employee = new Employees();
        $employee->employee_name = $request->employee_name;
        $employee->employee_job = $request->employee_job;
        $employee->employee_phone = $request->employee_phone;
        $employee->employee_gender = $request->employee_gender;
        $employee->employee_NIK = $request->employee_NIK;
        $employee->employee_address = $request->employee_address;
        $employee->employee_photo = $imageName;
        $employee->employee_DOB = $request->employee_DOB;
        $employee->employee_POB = $request->employee_POB;
        $employee->employee_email = $request->employee_email;
        $employee->save();

        event(new EmployeeCreated($employee));

        return redirect('/resepsi');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $imageName = time().'.'.$request->image->extension();

        $request->image->move(public_path('images'), $imageName);

        $employeeUpdate = Employees::findOrFail($id);
        $employeeUpdate->update([
            'employee_name' => $request->employee_name,
            'employee_job' => $request->employee_job,
            'employee_phone' => $request->employee_phone,
            'employee_gender' => $request->employee_gender,
            'employee_NIK' => $request->employee_NIK,
            'employee_address' => $request->employee_address,
            'employee_DOB' => $request->employee_DOB,
            'employee_POB' => $request->employee_POB,
            'employee_email' => $request->employee_email
        ]);

        if ($imageName != NULL) {
            File::delete(public_path('images/' . $employeeUpdate->employee_photo));
            $employeeUpdate->update([
                'employee_photo' => $imageName
            ]);
        }



        return redirect('/');
    }

    public function delete($id)
{
    $employeeDelete = Employees::findOrFail($id);
    $employeeDelete->delete();

	return redirect('/');
}
}
