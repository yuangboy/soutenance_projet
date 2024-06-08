<?php

namespace App\Http\Controllers\praticien;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;


use App\Models\Services;
use App\Models\User;
use App\Models\Service;
use App\Models\Praticien;
use App\Models\Patient;
use App\Models\Patientas;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class pContro extends Controller
{
    public function showPatient(){
        return view('frenteprati.index');
    }

    public function index2(){
        return view('frenteprati.index');
    }
}