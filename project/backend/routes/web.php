<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\API\AuthController;

Route::get('/', function () {
    return view('welcome');
});
Route::apiResource('/users',UserController::class)->middleware('auth:api');
Route::post('/login',[AuthController::class,'login']);
Route::post('/register',[AuthController::class,'register']);