<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\notifications\NotificationController;
use App\Http\Controllers\websocketController;
use App\Http\Controllers\PusherController;

Route::get('/send-notification', [NotificationController::class, 'sendNotification']);


// web socket route

Route::prefix('pusher')->group(function () {
    Route::get('test', [PusherController::class, 'index']);
    Route::post('broadcast', [PusherController::class, 'broadcast']);
    Route::post('receive', [PusherController::class, 'receive']);
});


Route::get('test',[websocketController::class,'test']);
Route::get('private',[websocketController::class,'private']);
Route::get('bbb',function(){
    return view('checkingWebsocket');
});