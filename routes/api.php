<?php

use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Auth\ProfileController;
use App\Http\Controllers\API\Auth\RegisterController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', [ProfileController::class, 'profile'])->middleware('auth:sanctum');
/*will be replaced*/


Route::prefix('auth')->group(function(){
    Route::post('/register',[RegisterController::class, 'register']);
    Route::post('/login',[LoginController::class,'login']);
    Route::middleware('auth:sanctum')->post('/logout', [LoginController::class, 'logout']);
});
