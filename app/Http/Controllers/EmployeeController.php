<?php

namespace App\Http\Controllers;

use App\Events\DisableAccount;
use App\Events\EmployeeCreated;
use App\Events\RoleChanged;
use App\Listeners\CreateUserForEmployee;
use App\Models\Employees;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Date;

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
        $limaBelas = Date::now()->subYears(15)->format('Y-m-d');
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            'employee_name' =>'required|max:50|regex:/^[a-zA-Z\s]+$/', //|alpha|max:25
            'employee_job' => 'required',
            'employee_phone' => 'required',
            'employee_gender' => 'required',
            'employee_NIK' => 'required|regex:/^\d{16}$/',
            'employee_address' => 'required',
            'employee_DOB' => ['required','date_format:Y-m-d','before:'.$limaBelas],
            'employee_POB' => 'required',
            'employee_email' =>'nullable|email'
        ],[
            'image' => 'Gambar yang dimasukkan harus dalam format jpeg atau png atau jpg atau svg',
            'employee_name' =>'Nama harus ditambahkan',
            'employee_name.regex' =>'Nama hanya boleh berisikan alfabet',
            'employee_name.max' =>'Nama maksimal 50 huruf',
            'employee_job' => 'Pekerjaan harus ditambahkan',
            'employee_phone' => 'Nomor telepon harus ditambahkan',
            'employee_gender' => 'Jenis Kelamin harus ditambahkan',
            'employee_NIK' => 'NIK harus diisi',
            'employee_NIK.regex' => 'NIK harus sesuai 16 digit',
            'employee_address' => 'Alamat harus ditambahkan',
            'employee_DOB' => 'Tanggal lahir harus ditambahkan',
            'employee_DOB.before' => 'Minimal 15 tahun',
            'employee_POB' => 'Tempat lahir harus ditambahkan',
            'employee_email.email' =>'Format email salah'
        ]);

        if ($request->image != NULL) {
            $imageName = $request->employee_name. '_' . $request->employee_DOB .'_' . time().'.'.$request->image->extension();

            $request->image->move(public_path('images'), $imageName);
        } else {
            $imageName = NULL;
        }





        $employee = new Employees();
        $employee->employee_name = $request->employee_name;
        $employee->employee_job = $request->employee_job;
        $employee->employee_phone = $request->employee_phone;
        $employee->employee_gender = $request->employee_gender;
        $employee->employee_NIK = $request->employee_NIK;
        $employee->employee_address = $request->employee_address;
        $employee->employee_photo = $imageName;
        $employee->status = '1';
        $employee->employee_DOB = $request->employee_DOB;
        $employee->employee_POB = $request->employee_POB;
        $employee->employee_email = $request->employee_email;
        $employee->save();

        event(new EmployeeCreated($employee));

        return redirect('/resepsi');
    }

    public function update(Request $request, $id)
    {
        $limaBelas = Date::now()->subYears(15)->format('Y-m-d');
        $request->validate([
            'image' => 'image|mimes:jpeg,png,jpg,svg|max:2048',
            'employee_name' =>'required|max:50|regex:/^[a-zA-Z\s]+$/', //|alpha|max:25
            'employee_job' => 'required',
            'employee_phone' => 'required',
            'employee_gender' => 'required',
            'employee_NIK' => 'required|size:16',
            'employee_address' => 'required',
            'employee_DOB' => ['required','date_format:Y-m-d','before:'.$limaBelas],
            'employee_POB' => 'required',
            'employee_email' =>'nullable|email'
        ],[
            'image' => 'Gambar yang dimasukkan harus dalam format jpeg atau png atau jpg atau svg',
            'employee_name' =>'Nama harus ditambahkan',
            'employee_name.regex' =>'Nama hanya boleh berisikan alfabet',
            'employee_name.max' =>'Nama maksimal 50 huruf',
            'employee_job' => 'Pekerjaan harus ditambahkan',
            'employee_phone' => 'Nomor telepon harus ditambahkan',
            'employee_gender' => 'Jenis Kelamin harus ditambahkan',
            'employee_NIK' => 'NIK harus ditambahkan',
            'employee_NIK.size' => 'NIK harus sesuai 16 digit',
            'employee_address' => 'Alamat harus ditambahkan',
            'employee_DOB' => 'Tanggal lahir harus ditambahkan',
            'employee_DOB.before' => 'Minimal 15 tahun',
            'employee_POB' => 'Tempat lahir harus ditambahkan',
            'employee_email.email' =>'Format email salah'
        ]);


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
        Log::alert('berjalan1');

        if ($request->image != NULL) {
            $imageName = $request->employee_name. '_' . $request->employee_DOB .'_' . time().'.'.$request->image->extension();

            $request->image->move(public_path('images'), $imageName);
            File::delete(public_path('images/' . $employeeUpdate->employee_photo));
            $employeeUpdate->update([
                'employee_photo' => $imageName
            ]);
        }
        Log::alert('berjalan2');

        event(new RoleChanged($employeeUpdate));

        return redirect('/');
    }

    public function delete($id)
{
    $employeeDelete = Employees::findOrFail($id);
    $employeeDelete->update([
        'status' => 0
    ]);

    event(new DisableAccount($employeeDelete));

	return redirect('/daftar-karyawan');
}
}
