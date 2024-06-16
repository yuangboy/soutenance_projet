<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Examen;
use App\Models\Patient;
use Illuminate\Support\Facades\Auth;


class ExamenController extends Controller
{
    public function createexamen($patientId)
    {
        $patient = Patient::findOrFail($patientId);
        return view('examen.prescrireexam', compact('patient'));
    }

    public function storeexamen(Request $request)
    {
        $request->validate([
            'titre' => 'required|string|max:255',
            'description' => 'required|string',
            'patients_id' => 'required|exists:patients,id',
        ]);

        $examen = Examen::create([
            'praticiens_id' => Auth::id(),
            'patients_id' => $request->patients_id,
            'titre' => $request->titre,
            'description' => $request->description,
            'numero' => $request->numero,
        ]);

        // Logic to send the exam to the patient can be added here


            // Envoi de l'email

        return redirect('/liste-patients')->with('success', 'Examen prescrit avec succès.');
    }

        public function showexm($id)
        {
            $examen = Examen::findOrFail($id);
            return view('examen.exm', compact('examen'));
        }

        // Méthode pour imprimer un examen
        public function printexm($id)
        {
            $examen = Examen::findOrFail($id);
            
            // Logique pour générer un fichier PDF ou imprimer l'examen
        }

        public function examimprime()
        {
            if (!auth()->check()) {
            return redirect()->route('login'); // Redirigez vers la page de connexion si l'utilisateur n'est pas connecté
        }

        // Récupérez l'utilisateur connecté
        $user = auth()->user();

        // Récupérez le patient associé à l'utilisateur
        $patient = $user->patient;

        // Vérifiez si le patient existe et récupérez ses examens
        $examens = $patient ? $patient->examens : collect();

        // Affichez les examens dans la vue
        return view('examimprime', compact('examens'));

        }
    }
