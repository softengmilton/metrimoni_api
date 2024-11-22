<?php

use App\Http\Controllers\API\Auth\RegisterController;
use App\Http\Controllers\API\Portal\FilterController;
use Illuminate\Support\Facades\Route;

Route::get('/hi', [RegisterController::class, 'index']);

Route::prefix('portal')->group(function () {
    Route::get('/selector-option', [FilterController::class, 'getOption']);
    Route::get('/get-council/{region}', [FilterController::class, 'getCouncil']);
});
