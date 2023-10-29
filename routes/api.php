<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::prefix('/api/v1')->middleware('auth:sanctum')->group(function () {
    Route::post('/login', 'API\AuthController@login');
    Route::post('/logout', 'API\AuthController@logout');
    Route::post('/register', 'API\AuthController@register');
});