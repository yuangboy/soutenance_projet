<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\serviceController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\praticien\pController;
use App\Http\Controllers\PraticienController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\OrdonnanceController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\images\ImageController;
use App\Http\Controllers\MeetingController;

// telechargement fiche patient


Route::get('fiche-patient/fiche',[ImageController::class,'FichePatient'])->middleware('auth');


//Route audio

use App\Http\Controllers\AgoraController;

Route::get('/voice-call', [MeetingController::class, 'index']);


// Route Meeting pour la video

Route::get('/video',[MeetingController::class,'meetingUser'])->name('meetingUser');
Route::get('/createMeeting',[MeetingController::class,'createMeeting'])->name('meetingUser');
Route::get('/joinMeeting/{url?}',[MeetingController::class,'joinMeeting'])->name('joinMeeting');


// Gestion des images

Route::get('upload', function () {
    return view('pdf.image.upload');
});

Route::post('upload', [ImageController::class, 'upload'])->name('image.upload');