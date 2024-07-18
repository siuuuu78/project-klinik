<?php

use App\Http\Controllers\DaftarController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use Illuminate\Auth\Middleware\Authenticate;


Route::get('/', function () {
    return view('welcome');
});


Route::resource('pasien', PasienController::class)->middleware(Authenticate::class);
Route::resource('daftar', DaftarController::class)->middleware(Authenticate::class);

Route::resource('dokter', DokterController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
