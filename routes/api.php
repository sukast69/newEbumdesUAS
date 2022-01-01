<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\FormController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/create', [FormController::class, 'create']);
    Route::get('/edit/{id_pengguna_air}', [FormController::class, 'edit']);
    Route::post('/edit/{id_pengguna_air}', [FormController::class, 'update']);
    Route::get('/delete/{id_pengguna_air}', [FormController::class, 'delete']);
    Route::get('/logout', [AuthController::class, 'logout']);
});

// Route::group(['middleware' => 'auth:sanctum'], function () {

//     Route::get('/form ', [FormController::class, 'index']);
//     Route::get('/logout', [AuthController::class, 'logout']);

// });

Route::post('/login', [AuthController::class, 'login']);