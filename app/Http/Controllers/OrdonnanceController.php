<?php

namespace App\Http\Controllers;

use App\Models\Ordonnance;
use App\Models\Praticien;
use App\Models\Patient;
use Illuminate\Http\Request;
use Dompdf\dompdf;

class OrdonnanceController extends Controller
{
    public function index()
    {
        return Ordonnance::with(['praticien', 'patient'])->get();
    }

    public function create()
    {
        $praticiens = Praticien::all();
        $patients = Patient::all();
        return view('frenteprati.create', compact('praticiens', 'patients'));
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
