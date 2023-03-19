<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(
    [
        // 'register' => false,
        'reset' => false,
        'verify' => false,
    ]
);

//Public Routes
Route::post('get-districts', [App\Http\Controllers\AjaxController::class, 'getDistricts'])->name('get-districts');
Route::post('get-upazilas', [App\Http\Controllers\AjaxController::class, 'getUpazilas'])->name('get-upazilas');
Route::post('get-doctors', [App\Http\Controllers\AjaxController::class, 'getDoctors'])->name('get-doctors');

// Admin Routes
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin'], 'as' => 'admin.'], function () {
    Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('doctors', [App\Http\Controllers\Admin\DoctorController::class, 'index'])->name('doctors.index');
    Route::get('doctors/add', [App\Http\Controllers\Admin\DoctorController::class, 'create'])->name('doctors.create');
    Route::post('doctors/store', [App\Http\Controllers\Admin\DoctorController::class, 'store'])->name('doctors.store');

    Route::get('agents', [App\Http\Controllers\Admin\AgentController::class, 'index'])->name('agents.index');
    Route::get('agents/add', [App\Http\Controllers\Admin\AgentController::class, 'create'])->name('agents.create');
    Route::post('agents/store', [App\Http\Controllers\Admin\AgentController::class, 'store'])->name('agents.store');
});

//Doctor Routes
Route::group(['prefix' => 'doctor', 'middleware' => ['auth', 'doctor'], 'as' => 'doctor.'], function () {
    Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('appointments', [App\Http\Controllers\Doctor\PatientController::class, 'index'])->name('appointment.index');
    Route::get('appointments/accept/{id}', [App\Http\Controllers\Doctor\PatientController::class, 'accept'])->name('appointment.accept');
    Route::get('appointments/reject/{id}', [App\Http\Controllers\Doctor\PatientController::class, 'reject'])->name('appointment.reject');
    Route::get('appointments/view/{id}', [App\Http\Controllers\Doctor\PatientController::class, 'view'])->name('appointment.view');
});

// Agent Routes
Route::group(['prefix' => 'agent', 'middleware' => ['auth', 'agent'], 'as' => 'agent.'], function () {
    Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('patients', [App\Http\Controllers\Agent\PatientController::class, 'index'])->name('patients.index');
    Route::get('patients/add', [App\Http\Controllers\Agent\PatientController::class, 'create'])->name('patients.create');
    Route::post('patients/store', [App\Http\Controllers\Agent\PatientController::class, 'store'])->name('patients.store');
    Route::get('patients/show/{id}', [App\Http\Controllers\Agent\PatientController::class, 'show'])->name('patients.show');
});
