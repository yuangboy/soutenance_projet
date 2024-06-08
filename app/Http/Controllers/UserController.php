<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Praticien;

class UserController extends Controller
{
    public function user_liste(){
        $users = User::all();
        return view('frontend.layouts.user',compact('users'));
    }
     public function showPraticienForm($id)
    {
        $praticiens = Praticien::find($id);
        return view('frontad.praticienForm', compact('praticiens'));
    }
    public function savePraticienDetails(Request $request)
        {
            $request->validate([
            'user_id' => 'required|exists:users,id',
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'dateNaisse' => 'required|date',
            'genre' => 'required|string',
            'tel' => 'required|string',
            'profession' => 'required|string',
            'adresse' => 'required|string',
            'matricule' => 'required|string',
            'service_id' => 'required|integer',
        ]);

        $praticiens = Praticien::find($request->input('praticiens_id'));
        $praticiens->nom = $request->input('nom');
        $praticiens->prenom = $request->input('prenom');
        $praticiens->dateNaisse = $request->input('dateNaisse');
        $praticiens->genre = $request->input('genre');
        $praticiens->tel = $request->input('tel');
        $praticiens->profession = $request->input('profession');
        $praticiens->adresse = $request->input('adresse');
        $praticiens->matricule = $request->input('matricule');
        $praticiens->service_id = $request->input('service_id');
        $praticiens->save();

        return redirect()->route('admin.users.index')->with('success', 'Informations du praticien enregistrées avec succès');
}
}
