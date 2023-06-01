<?php

use App\Http\Controllers\API\v1\PatientController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\EmployeeController;
use App\Models\Appointment;
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
});
// Route::get('test', function () {
//     return view('resepsi');
// });

// Route::get('register', function () {
//     return view('register-user');
// });

Route::get('/',function(){
    return redirect('/resepsi');

});


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

Route::get('resepsi',[AntrianController::class,'index']);

Route::get('form_rekam', function () {
    return view('form-rekammedis');
});
Route::get('pasien', function () {
    return view('pasien');
});

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

