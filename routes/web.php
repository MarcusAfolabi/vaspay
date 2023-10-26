<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CableController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AirtimeController;
use App\Http\Controllers\ElectricityController;
 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [HomeController::class, 'index'])->name('dashboard');

Route::get('/about', function () {
    return view('about');
});

Route::get('/vas', function () {
    return view('vas');
});

 
Route::name('account.')->group(function () {
    Route::get('/profile', [AccountController::class, 'index'])->name('index');
    Route::get('/profile-edit', [AccountController::class, 'edit'])->name('edit');
    Route::get('/profile-logout', [AccountController::class, 'logout'])->name('logout');
    Route::get('login', [AccountController::class, 'login'])->name('login');
    Route::get('register', [AccountController::class, 'register'])->name('register');
    Route::get('forgot-password', [AccountController::class, 'forgotPassword'])->name('forgot-password');
    Route::get('reset-password', [AccountController::class, 'resetPassword'])->name('reset-password');

    Route::post('login', [AccountController::class, 'postLogin'])->name('login.post');
    Route::post('register', [AccountController::class, 'postRegister'])->name('register.post');
});

Route::prefix('airtime.')->group(function () {
    Route::get('/', [AirtimeController::class, 'index'])->name('index.airtime');
});

Route::prefix('data.')->group(function () {
    Route::get('/', [DataController::class, 'index'])->name('index.data');
});

Route::prefix('cable.')->group(function () {
    Route::get('/', [CableController::class, 'index'])->name('index.cable');
});

Route::prefix('electricity.')->group(function () {
    Route::get('/', [ElectricityController::class, 'index'])->name('index.electricity');
});