<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PoliController;
use App\Http\Controllers\DaftarController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use Illuminate\Auth\Middleware\Authenticate;


Route::get('/', function () {
    return view('welcome');
});


Route::middleware('auth')->group(function () {
    Route::resource('pasien', PasienController::class);
    Route::resource('daftar', DaftarController::class);
    Route::resource('poli', PoliController::class);
});

Route::resource('dokter', DokterController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('logout', function(){
    Auth::logout();
    return redirect('login');
});
