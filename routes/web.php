<?php


use App\Http\Controllers\UserController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\PatientController ;
use App\Http\Controllers\RekamController;
use App\Models\Appointment;
use App\Models\Medicine;
use App\Models\Patient;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('resepsi', function () {
    return view('resepsi');
})->middleware(['auth','admin']);

Route::get('resepsi',[AntrianController::class,'index'])->middleware(['auth','admin']);
Route::get('resepsi',[PatientController::class,'index'])->middleware(['auth','admin']);

// Route::get('register', function () {
//     return view('register-user');
// });

Route::get('/',function(){
    return redirect('/login');

});

Route::get('pasien/{id}', [PatientController::class , 'patient']) -> name('to.pasien');


Route::get('dev', function () {
    return view('crud-sandbox');
});

Route::post('/dev/simp', [UserController::class,'store']);

// Route::post('/patient/insert', 'PatientController@insert');

// Route::get('login', function () {
//     return view('login-user');
// });

Route::get('users', function () {
    return view('crud-sandbox');
});

Route::get('/logout', [UserController::class, 'logout']);

Route::get('tambah-karyawan', function () {
    return view('form-empregister');
});

Route::post('add-employee', [EmployeeController::class,'insert']);


Route::get('form_rekam', function () {
    return view('tambah-rekam-medis-page');
});

Route::post('form_rekam/tambah', [RekamController::class,'insert']);

Route::post('tambah-antrian', [AntrianController::class,'insert']);

// Route::get('pasien', function () {
//     return view('pasien');
// });

Route::get('tambah-obat', function () {
    return view('form-obat');
});

Route::post('tambah-obat/tambah', [MedicineController::class,'insert']);

Route::get('daftar-pasien', function () {
    return view('patient-list');
});

Route::get('daftar-employee', function () {
    return view('employee-list');
});

Route::get('profil', function () {
    return view('employee-profile');
});

Route::view('/pasien', 'pasien');

//obat
Route::get('edit_obat', function () {
    return view('edit-obat');
});
Route::get('add_obat', function () {
    return view('form-obat');
});
Route::get('obat', function () {
    return view('obat');
});
Route::get('list_obat', function () {
    return view('obat-list');
});



Route::get('edit_rekam', function () {
    return view('edit-rekammedis');
});

Route::get('edit_emp', function () {
    return view('edit-employee');
});
Route::get('add_pasien', function () {
    return view('form-patient');
});
Route::get('edit_pasien', function () {
    return view('edit-patient');
});
