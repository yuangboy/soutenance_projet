<?php
namespace App\Http\Controllers;

use App\Models\Horaire;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Events\PraticienHoraire;
use App\Models\User;

class HoraireController extends Controller
{
    public function index()
    {
        $praticien = Auth::user()->praticien;

        return view('frenteprati.tableTime', ['horaires' => $praticien->horaires]);
    }

    public function horaire()
    {
        $praticien = Auth::user()->praticien;
        return view('frenteprati.horaires', ['horaires' => $praticien->horaires]);
    }

    public function create()
    {
        return view('praticien.creath');
    }

    public function store(Request $request)
    {
        $request->validate([
            'start_time' => 'required|date',
            'end_time' => 'required|date|after:start_time',
        ]);

        $praticien = Auth::user()->praticien;
        // dd($praticien);




        $horaire=Horaire::create([
            'praticien_id' => $praticien->id,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'is_available' => true,
        ]);

        if(Auth::user() instanceof User){
            event(new PraticienHoraire($horaire, Auth::user()));
        }

        return redirect()->route('horaires.index')->with('status', 'Horaire créé avec succès.');

    }

    public function destroy($id)
    {
        $horaire = Horaire::findOrFail($id);
        $horaire->delete();

        return redirect()->route('horaires.index')->with('status', 'Horaire supprimé avec succès.');
    }
}