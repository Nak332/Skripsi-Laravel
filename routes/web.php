<?php


use App\Http\Controllers\UserController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AntrianController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\MedicineDetailController;
use App\Http\Controllers\PatientController ;
use App\Http\Controllers\RekamController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\VaksinController;
use App\Models\Appointment;
use App\Models\Medicine;
use App\Models\Patient;
use App\Models\RekamMedis;
use App\Models\Transaction;
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

// Route::get('/trs',function(){
//     return view('transaksi.transaksi');
// });




Route::middleware(['checkrole:Kepala Praktek'])->group(function () {
    Route::post('ganti-password-karyawan/{id}', [EmployeeController::class,'password']);
    Route::get('/tambah-karyawan', function () {
        return view('form-empregister');
    });
    Route::get('/daftar-karyawan', function () {
        return view('employee-list');
    });
    Route::post('/add-employee', [EmployeeController::class,'insert']);
    Route::post('/disable-employee/{id}', [EmployeeController::class,'delete']);
    Route::get('/profil/{id}', [EmployeeController::class , 'employee']) -> name('to.emp');
    Route::get('/edit-emp/{id}', [EmployeeController::class , 'employee']);
    Route::post('/edit-emp/edit/{id}', [EmployeeController::class , 'update']);
});

Route::middleware(['isLogin'])->group(function () {
    Route::get('/',[AntrianController::class,'index']);
    Route::get('/resepsi',[AntrianController::class,'index']);
    Route::get('/logout', [UserController::class, 'logout']);
    Route::get('/db', function(){
        return view('dashboard.dashboard_main');
    });
    Route::get('/profil-user',function(){
        return view('user-profile');
    });
    Route::get('/change-password',function(){
        return view('change-user-password');
    });
    Route::post('/change-password', [UserController::class,'updatePassword']);
});

Route::middleware(['checkrole:Kepala Praktek,Dokter'])->group(function () {
    Route::get('/form-rekam/{id}', [RekamController::class , 'Rekam']);
    Route::get('/form-rekam/new', [RekamController::class , 'Rekam']);
    Route::post('form_rekam/tambah', [RekamController::class,'insert']);
    Route::post('vaksinasi/tambah', [VaksinController::class,'insert']);
    Route::get('/tambah-vaksin/{id}', [VaksinController::class , 'Vaksin']);
    Route::get('tambah-vaksin', function () {
        return view('form-vaksin');
    });
    Route::get('daftar-rekam', function () {
        return view('rekam-table');
    });

});

Route::middleware(['checkrole:Kepala Praktek,Dokter,Farmasi'])->group(function () {
    Route::get('/transaksi/{id}',[TransactionController::class,'transaksi'])->name('to.transaction');
    Route::post('/update-transaksi/{id}', [TransactionController::class,'update']);
    Route::get('edit-obat/{id}/edit', [MedicineController::class , 'medicines']);
    Route::post('edit-obat/{id}', [MedicineController::class , 'update']);
    Route::get('obat/{id}', [MedicineController::class , 'medicines']) -> name('to.obat');
    Route::get('daftar-obat', function () {
       return view('obat-list');
    });
    Route::get('tambah-obat', function () {
        return view('form-obat');
    });
    Route::post('/tambah-obat/tambah', [MedicineController::class,'insert']);
    Route::post('/delete-obat/{id}', [MedicineController::class,'delete']);
    Route::post('/tambah-stock', [MedicineDetailController::class,'insert']);
    Route::post('/edit-stock/{id}', [MedicineDetailController::class,'update']);
    Route::post('/delete-stock/{id}', [MedicineDetailController::class,'delete']);
    Route::get('daftar-transaksi', function () {
        return view('transaction-list');
    });
    Route::post('/tambah-transaksi', [TransactionController::class,'insert']);
    Route::post('/batalkan-transaksi/{id}', [TransactionController::class,'delete']);
});


Route::middleware(['checkrole:Kepala Praktek,Dokter,Perawat,Resepsionis'])->group(function () {
    Route::get('/daftar-pasien', function () {
        return view('patient-list');
    });
    Route::get('/surat/{name}/{id}', [RekamController::class , 'Surat']);
    Route::view('/pasien', 'pasien');
    Route::get('/pasien/{id}', [PatientController::class , 'patient']) -> name('to.pasien');
    Route::get('/tambah-pasien', function () {
        return view('form-patient');
    });
    Route::post('/tambah-pasien/tambah', [PatientController::class,'insert']);
    Route::get('/pasien/{id}/edit', [PatientController::class,'patient']);
    Route::post('/edit/pasien/{id}', [PatientController::class,'update']);
    Route::post('/hapus-antrian/{id}', [AntrianController::class,'delete']);
    Route::get('edit_pasien', function () {
        return view('edit-patient');
    });
    Route::post('/tambah-antrian', [AntrianController::class,'insert']);
    Route::post('pra-rekam/{id}', [AntrianController::class,'update']);
});



Route::get('/forgot-password', function(){
    return view('userForgot.forgot-password');
});
Route::get('/reset_password', function(){
    return view('userForgot.reset-password');
});


//obat









// Route::get('dev', function () {
//     return view('crud-sandbox');
// });

// Route::post('/dev/simp', [UserController::class,'store']);

// Route::post('/patient/insert', 'PatientController@insert');

// Route::get('login', function () {
//     return view('login-user');
// });

// Route::get('users', function () {
//     return view('crud-sandbox');
// });



// Route::get('pasien', function () {
//     return view('pasien');
// });














// Route::get('edit-rekam', function () {
//     return view('edit-rekammedis');
// });



