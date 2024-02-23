<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\SurveyController;
use App\Http\Controllers\BioController;
use App\Http\Controllers\KeluargaController;


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

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::post('register', [AuthController::class, 'register']);
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout']);
    Route::post('refresh', [AuthController::class, 'refresh']);
    Route::post('me', [AuthController::class, 'me']);

   // Route::middleware(['role:admin'])->group(function () {
   ///     Route::get('/surveys', [SurveyController::class, 'index']);
   //     Route::post('register', [AuthController::class, 'register']);
   // }); 

Route::middleware(['role:user'])->group(function () {
    Route::get('/bios', [BioController::class, 'index']);
    Route::get('/bios/{id}', [BioController::class, 'show']);
    Route::post('/bios', [BioController::class, 'store']);
    Route::put('/bios/{id}', [BioController::class, 'update']);
    Route::delete('/bios/{id}', [BioController::class, 'destroy']);
    });

Route::middleware(['role:user'])->group(function () {
        Route::get('/keluarga', [BioController::class, 'index']);
        Route::get('/keluarga/{id}', [BioController::class, 'show']);
        Route::post('/keluarga', [BioController::class, 'store']);
        Route::put('/keluarga/{id}', [BioController::class, 'update']);
        Route::delete('/keluarga/{id}', [BioController::class, 'destroy']);
        });
});
