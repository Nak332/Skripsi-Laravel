<?php

use App\Http\Controllers\API\v1\AppointmentController;
use App\Http\Controllers\API\v1\PatientController;
use App\Models\Appointment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group(['prefix'=>'v1','namespace'=> 'App\Http\Controllers\API\v1'], function(){
    Route::apiResource('patients',PatientController::class);
    Route::apiResource('appointments',AppointmentController::class);
}  );