<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DiseaseController;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\TreatmentController;
use App\Http\Controllers\PatientTreatmentsController;
use App\Http\Middleware\Authenticate;
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

Auth::routes([
    'register' => false, 'reset' => false, 'verify' => false
]);

Route::middleware([Authenticate::class])->group(function () {
    Route::get('/', [HomeController::class, 'index'])->name('home');
    Route::resource('users', UserController::class);
    Route::resource('diseases', DiseaseController::class);
    Route::resource('patients', PatientController::class);
    Route::resource('treatment', TreatmentController::class);
    Route::resource('patient-treatments', PatientTreatmentsController::class);
    Route::post('treatment-slots', [PatientTreatmentsController::class, 'treatmentSlots'])->name('treatment-slots');
});
