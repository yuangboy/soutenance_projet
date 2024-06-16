<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\notifications\NotificationController;
use App\Http\Controllers\websocketController;
use App\Http\Controllers\PusherController;
use App\Http\Controllers\PusherController2;

Route::get('/send-notification', [NotificationController::class, 'sendNotification']);


// web socket route

Route::prefix('pusher')->group(function () {
    Route::get('test', [PusherController::class, 'index']);
    Route::post('broadcast', [PusherController::class, 'broadcast']);
    Route::post('receive', [PusherController::class, 'receive']);
});

// web socket route 2

Route::prefix('pusher2')->group(function () {
    Route::get('test', [PusherController2::class, 'index']);
    Route::post('broadcast', [PusherController2::class, 'broadcast']);
    Route::post('receive', [PusherController2::class, 'receive']);
    Route::post('private-message', [PusherController2::class, 'sendPrivateMessage']);


});
 Route::post('pusher/auth', [PusherController2::class, 'authenticate']);


Route::get('test',[websocketController::class,'test']);
Route::get('private',[websocketController::class,'private']);
Route::get('bbb',function(){
    return view('checkingWebsocket');
});