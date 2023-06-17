<?php


use App\Http\Controllers\UserController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\MedicineDetailController;
use App\Http\Controllers\PatientController ;
use App\Http\Controllers\RekamController;
use App\Http\Controllers\VaksinController;
use App\Models\Appointment;
use App\Models\Medicine;
use App\Models\Patient;
use GuzzleHttp\Psr7\Request;
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

Route::get('/trs',function(){
    return view('transaksi.transaksi');
});




Route::middleware(['isLogin'])->group(function () {
    Route::get('/resepsi', function () {
        return view('resepsi');
    });
    Route::get('/',function(){
        return redirect('/resepsi');
    });

    Route::get('resepsi',[AntrianController::class,'index']);
    // Route::get('resepsi',[PatientController::class,'index']);

    Route::get('/logout', [UserController::class, 'logout']);
    Route::get('/daftar-pasien', function () {
        return view('patient-list');
    });
    Route::view('/pasien', 'pasien');
    Route::get('/db', function(){
        return view('dashboard.dashboard_main');
    });

});

Route::middleware(['checkrole:admin,Dokter'])->group(function () {
    Route::get('/pasien/{id}', [PatientController::class , 'patient']) -> name('to.pasien');
    Route::get('/tambah-karyawan', function () {
        return view('form-empregister');
    });
    Route::get('/daftar-karyawan', function () {
        return view('employee-list');
    });
    Route::post('/add-employee', [EmployeeController::class,'insert']);
    Route::post('/disableemployee/{id}', [EmployeeController::class,'delete']);
    Route::get('/profil/{id}', [EmployeeController::class , 'employee']) -> name('to.emp');
    Route::get('/edit-emp/{id}', [EmployeeController::class , 'employee']);
    Route::post('/edit-emp/edit/{id}', [EmployeeController::class , 'update']);
    Route::get('/form-rekam/{id}', [RekamController::class , 'Rekam']);
    Route::get('/form-rekam/new', [RekamController::class , 'Rekam']);
    // Route::get('/form-rekam', function () {
    //     return view('tambah-rekam-medis-page');
    // });

    Route::post('form_rekam/tambah', [RekamController::class,'insert']);
    Route::post('vaksinasi/tambah', [VaksinController::class,'insert']);
    Route::get('/tambah-vaksin/{id}', [VaksinController::class , 'Vaksin']);
    Route::get('tambah-vaksin', function () {
        return view('form-vaksin');
    });
});

Route::middleware(['checkrole:admin,Dokter,Perawat'])->group(function () {
    Route::get('/tambah-pasien', function () {
        return view('form-patient');
    });
    Route::post('/tambah-pasien/tambah', [PatientController::class,'insert']);
    Route::get('/pasien/{id}/edit', [PatientController::class,'patient']);
    Route::post('/edit/pasien/{id}', [PatientController::class,'update']);
    Route::post('/hapus-antrian/{id}', [AntrianController::class,'delete']);
});


//obat
Route::get('edit_obat', function () {
    return view('edit-obat');
});
Route::get('obat/{id}', [MedicineController::class , 'medicines']) -> name('to.obat');
Route::get('daftar-obat', function () {
    return view('obat-list');
});

Route::get('tambah-obat', function () {
    return view('tambah-obat-page');
});

Route::post('tambah-obat/tambah', [MedicineController::class,'insert']);
Route::post('/tambah-stock', [MedicineDetailController::class,'insert']);
Route::post('/edit-stock/{id}', [MedicineDetailController::class,'update']);
Route::post('/delete-stock/{id}', [MedicineDetailController::class,'delete']);
Route::post('tambah-antrian', [AntrianController::class,'insert']);

// Route::get('register', function () {
//     return view('register-user');
// });



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











// Route::get('pasien', function () {
//     return view('pasien');
// });













Route::get('edit-rekam', function () {
    return view('edit-rekammedis');
});



Route::get('edit_pasien', function () {
    return view('edit-patient');
});
