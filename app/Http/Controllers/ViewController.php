<?php

namespace App\Http\Controllers;
use App\Models\Praticien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    public function showPatientView()
    {
        $praticiens = Praticien::all();
        return view('patient', compact('praticiens'));
    }

    public function showPraticienView()
    {
        $user = Auth::user();
        $praticien = Praticien::where('user_id', $user->id)->first();

        if (!$praticien) {
            return redirect()->route('home')->with('error', 'Praticien non trouvé.');
        }

        return view('praticien', compact('praticien'));
    }
    public function confirmes()
    {
        $user = Auth::user();
        $praticien = Praticien::where('user_id', $user->id)->first();

        if (!$praticien) {
            return redirect()->route('home')->with('error', 'Praticien non trouvé.');
        }

        return view('frenteprati.rdvconfirme', compact('praticien'));
    }
    public function showPraticienPatient()
    {
        $user = Auth::user();
        $praticien = Praticien::where('user_id', $user->id)->first();

        if (!$praticien) {
            return redirect()->route('home')->with('error', 'Praticien non trouvé.');
        }

        return view('listepatient', compact('praticien'));
    }
}
