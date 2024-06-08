<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Services;
use App\Models\Service;
use App\Models\Praticien;

class serviceController extends Controller
{
    public function liste_service(){
         $service = Services::all();
        return view('frontend.layouts.listeservice',compact('service'));
    }

    public function listeservicep(){
         $service = Services::all();
        return view('frontend.layouts.listeservicep',compact('service'));
    }

     public function praticiens(){
         $praticiens = Praticien::all();
        return view('frontend.layouts.listepraticiensP',compact('praticiens'));
    }

    public function indexe()
    {
        $service = Services::all();
        return view('frontend.layouts.listeservice',compact('service'));
        //return view('admin.listeservice');
    }



    public function index()
    {
        return Service::all();
    }

    public function store(Request $request)
    {
        return Service::create($request->all());
    }

    public function show($id)
    {
        return Service::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $service = Service::findOrFail($id);
        $service->update($request->all());
        return $service;
    }

    public function destroy($id)
    {
        $service = Service::findOrFail($id);
        $service->delete();
        return 204; // No Content
    }
}
