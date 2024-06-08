<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Paiement;

class PaiementController extends Controller
{
    public function formpaye()
    {
        return view('patient.frontad.paiement');
    }

    public function paye(Request $request)
    {
        $request->validate([
            'montant' => 'required|numeric|min:0',
            'phone' => 'required|digits:9',
            'raison' => 'required|string',
        ]);

        Paiement::create($request->all());

        return redirect()->back()->with('success', 'Formulaire soumis avec succès!');
    }
}
