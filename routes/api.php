<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PraticienController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
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

Route::resource('praticiens', PraticienController::class);
Route::resource('service', ServiceController::class);

Route::post('register', [RegisteredUserController::class, 'insert'])
                ->name('register-api');

Route::post('login', [AuthenticatedSessionController::class, 'login'])
                ->name('login-api');

Route::get('', [FrontendController::class, 'indexs'])
    ->name('indexs');
