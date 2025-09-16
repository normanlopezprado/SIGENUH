<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\HospitalServiceController;
use App\Http\Controllers\HospitalController;
use App\Http\Controllers\NivelController;
use App\Http\Controllers\UserHospitalController;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware('auth')
    ->name('dashboard');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])
    ->name('logout');

Route::resource('hospital-services', HospitalServiceController::class)
    ->middleware(['auth']);

Route::resource('hospitals', HospitalController::class)
    ->middleware(['auth']);

Route::resource('niveles', NivelController::class)
    ->parameters(['niveles' => 'nivel'])
    ->middleware(['auth']);


Route::post('/user/select-hospital/{hospital}', [UserHospitalController::class, 'select'])
    ->middleware('auth')
    ->name('user.select-hospital');
