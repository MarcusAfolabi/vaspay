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

 


Route::get('/account', [AccountController::class, 'index'])->name('account.index');
