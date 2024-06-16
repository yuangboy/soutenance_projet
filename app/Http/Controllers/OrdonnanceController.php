<?php

namespace App\Http\Controllers;

use App\Models\Ordonnance;
use App\Models\Praticien;
use App\Models\Rendezvouss;
use App\Models\Patient;
use Illuminate\Http\Request;
use Dompdf\dompdf;
use Illuminate\Support\Facades\Auth;

class OrdonnanceController extends Controller
{
    public function index()
    {
        return Ordonnance::with(['praticien', 'patient'])->get();
    }

    /*public function create()
    {
        $praticiens = Praticien::all();
        $patients = Patient::all();
        return view('frenteprati.create', compact('praticiens', 'patients'));
    }*/

    /*public function create($patientId)
    {

        $patient = Patient::findOrFail($patientId);
        return view('frenteprati.create', compact('patient'));
    }*/


/*public function create()
{
    $praticien = Auth::user();

    if (!$praticien) {
        return redirect()->route('login')->with('error', 'Vous devez être connecté.');
    }

    // Débogage pour vérifier l'ID du praticien
    dd($praticien->id);

    // Récupérer les patients directement en utilisant une jointure
    $patients = Patient::select('patients.*')
        ->join('rendezvousses', 'patients.id', '=', 'rendezvousses.patient_id')
        ->where('rendezvousses.praticien_id', $praticien->id)
        ->get();

    // Débogage pour vérifier les patients récupérés
    if ($patients->isEmpty()) {
        dd('Aucun patient trouvé', $praticien->id, $patients);
    } else {
        dd('Patients trouvés', $patients);
    }

    return view('frenteprati.create', compact('praticien', 'patients'));
}*/
public function create()
{
    $user = Auth::user();
    $praticien = $user->praticien; // Supposons que chaque utilisateur est lié à un praticien

    if (!$praticien) {
        return redirect()->route('login')->with('error', 'Vous devez être connecté en tant que praticien.');
    }

    // Récupérer les patients directement en utilisant une jointure
    $patients = Patient::select('patients.*')
        ->join('rendezvousses', 'patients.id', '=', 'rendezvousses.patient_id')
        ->where('rendezvousses.praticien_id', $praticien->id)
        ->get();

    // Débogage pour vérifier les patients récupérés
    if ($patients->isEmpty()) {
        return view('frenteprati.create', compact('praticien', 'patients'))
            ->with('error', 'Aucun patient trouvé');
    }

    return view('frenteprati.create', compact('praticien', 'patients'));
}

    public function store(Request $request)
    {
        $request->validate([
            'praticien_id' => 'required|exists:praticiens,id',
            'patient_id' => 'required|exists:patients,id',
            'medicaments' => 'required|string',
            'instructions' => 'required|string',
        ]);

        $ordonnance = Ordonnance::create($request->all());
        return redirect()->route('ordonnances.show', $ordonnance->id);
    }

    public function show($id)
    {
        $ordonnance = Ordonnance::with(['praticien', 'patient'])->findOrFail($id);
        return view('frenteprati.show', compact('ordonnance'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'medicaments' => 'required|string',
            'instructions' => 'required|string',
        ]);

        $ordonnance = Ordonnance::findOrFail($id);
        $ordonnance->update($request->all());
        return response()->json($ordonnance, 200);
    }

    public function delete($id)
    {
        $ordonnance = Ordonnance::findOrFail($id);
        $ordonnance->delete();
        return response()->json(null, 204);
    }
}
