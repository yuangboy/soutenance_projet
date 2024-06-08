<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PageController extends Controller
{
    public function index()
    {
        return view('admin.listeservice');
    }

    public function aPropos()
    {
        return view('a_propos');
    }

    public function services()
    {
        return view('services');
    }

    public function contact()
    {
        return view('contact');
    }
}