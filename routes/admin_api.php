
<?php

use App\Http\Controllers\API\Auth\RegisterController;
use Illuminate\Support\Facades\Route;

Route::get('/i', [RegisterController::class, 'index']);
