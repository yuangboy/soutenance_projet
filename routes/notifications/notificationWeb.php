<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\notifications\NotificationController;


Route::get('/send-notification', [NotificationController::class, 'sendNotification']);