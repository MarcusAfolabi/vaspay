<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
 

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    // return $request->user();
    return "working";
});


// Route::domain('api.domainname.com')->prefix('/api/v1')->middleware('auth:sanctum')->group(function () {
    // Route::middleware('auth:sanctum')->group(function () {
Route::middleware('auth:sanctum')->post('/api/v1', function (Request $request) {

    Route::post('/login', 'Api\AuthController@postLogin');
    Route::post('/register', 'Api\AuthController@postRegister');
    Route::post('forgot-password', 'Api\AuthController@forgotPassword');
    Route::post('reset-password', 'Api\AuthController@resetPassword');
    Route::post('/logout', 'Api\AuthController@logout');
});
