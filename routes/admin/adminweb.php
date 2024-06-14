<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\serviceController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\patient\AdpaController;


Route::middleware(['auth','roles:admin'])->group(function(){


    Route::prefix('admin')->group(function(){

        // ************* Route attribution role *******************
        Route::get('/attribution/role',[AdminController::class,'vueCreateRole'])->name('create.role');
        Route::post('/attribution/role',[AdminController::class,'storeRole'])->name('attribution.role');

        // **************Route return enregistrement patient ********************
        Route::get('/create/patient',[AdpaController::class,'createPatient'])->name('create.patient');
        Route::post('/create/patient',[AdpaController::class,'storePatient'])->name('store.patient');

         // **************Route return enregistrement praticien ********************
         Route::get('/create/praticien',[AdpaController::class,'createPraticien'])->name('create.praticien');
         Route::post('/create/praticien',[AdpaController::class,'storePraticien'])->name('store.praticien');

        }); 



});