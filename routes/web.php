<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DataController;
use App\Http\Controllers\ExamController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\CableController;
use App\Http\Controllers\AccountController;
use App\Http\Controllers\AirtimeController;
use App\Http\Controllers\API\KeyController;
use App\Http\Controllers\MonnifyController;
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

 
Route::controller(KeyController::class)->group(function () {
    Route::get('/verification', 'index')->name('verify.agent');
    Route::post('/verification/agent', 'loginAgent')->name('agent.login');
});

Route::controller(AccountController::class)->group(function () {
    Route::get('login', 'login')->name('login');
    Route::post('login', 'postLogin')->name('login.post');
    Route::get('register', 'register')->name('register');   
    Route::post('register', 'postRegister')->name('register.post');   
    Route::get('forgot-password', 'forgotPassword')->name('forgot-password');
    Route::post('/forgot-password_', 'forgotPasswordPost')->name('forgot.password');
    Route::get('/reset-password/{token}', 'resetPassword')->name('reset.password');
    Route::post('/reset-password', 'resetPasswordPost')->name('reset.password.post');
    Route::get('/profile', 'index')->name('index');
    Route::get('/profile-edit', 'edit')->name('edit');
    Route::get('/profile-logout', 'logout')->name('logout');
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

Route::prefix('exam.')->group(function () {
    Route::get('/', [ExamController::class, 'index'])->name('index.exam');
});

Route::controller(MonnifyController::class)->group(function () {
    Route::get('/fund_wallet', 'index')->name('fund.index');
    Route::post('/fund/process', 'initiate')->name('fund.initiate');
    Route::post('/fund/transfer', 'transferWallet')->name('transfer.initiate');
    Route::post('/transfer/commission', 'transferCommission')->name('transfer.commission');
    Route::get('/transaction-confirm', 'webhook');
    Route::get('/customer-funds-history', 'fundHistory')->name('fund.history');

});