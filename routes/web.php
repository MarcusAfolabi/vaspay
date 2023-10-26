<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AccountController;
 

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/vas', function () {
    return view('vas');
});

 
Route::prefix('account')->name('account.')->group(function () {
    Route::get('/', [AccountController::class, 'index'])->name('index');
    Route::get('login', [AccountController::class, 'login'])->name('login');
    Route::get('register', [AccountController::class, 'register'])->name('register');
    Route::get('forgot-password', [AccountController::class, 'forgotPassword'])->name('forgot-password');
    Route::get('reset-password', [AccountController::class, 'resetPassword'])->name('reset-password');

    Route::post('login', [AccountController::class, 'postLogin'])->name('login.post');
    Route::post('register', [AccountController::class, 'postRegister'])->name('register.post');
});

