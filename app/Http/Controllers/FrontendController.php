<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{

    public function contact(){
        return view('frontend.layouts.contact');
    }

    public function index(){
        return view('frontend.index');
    }

     public function indexs(){
        return view('frontend.index');
    }

    public function login(){
        return view('frontend.auth.login');
    }

}
