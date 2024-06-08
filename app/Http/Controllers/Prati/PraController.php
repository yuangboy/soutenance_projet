<?php

namespace App\Http\Controllers\Prati;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Models\Praticien;

class PraController extends Controller

{
//$praticiens = Praticien::All()compact('praticiens');
    public function dashboardprati(){
        return view('pratic/dashboardprati');
    }


}