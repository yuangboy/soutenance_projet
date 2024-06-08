<?php

namespace App\Http\Controllers;
use App\Models\Rendezvouss;
use App\Models\Patient;
use App\Models\Praticien;
use Illuminate\Http\Request;
use App\Models\Horaire;


class RendezvoussController extends Controller
{
    /*public function availableHoraires()
    {
        $horaires = Horaire::where('is_available', true)->get();

        return view('patient.horaires', ['horaires' => $horaires]);
    }*/
    public function availableHoraires($praticien_id)
    {
        $horaires = Horaire::where('is_available', true)
                            ->where('praticien_id', $praticien_id)
                            ->get();

        return view('patient.horaires', ['horaires' => $horaires, 'praticien_id' => $praticien_id]);
    }

    public function requestAppointment($horaireId)
    {
        $user = auth()->user();
        $horaire = Horaire::findOrFail($horaireId);

        if (!$horaire->is_available) {
            return redirect()->back()->with('error', 'Ce créneau horaire n\'est pas disponible.');
        }

        // Créer le rendez-vous avec le statut 'en attente'
        $rendezvous = new Rendezvouss();
        $rendezvous->patient_id = $user->id; // Assurez-vous que l'utilisateur est un patient
        $rendezvous->praticien_id = $horaire->praticien_id;
        $rendezvous->appointment_time = $horaire->start_time;
        $rendezvous->status = 'en attente';
        $rendezvous->save();

        // Marquer l'horaire comme indisponible
        $horaire->is_available = false;
        $horaire->save();

        return redirect()->route('patient.horaires', ['praticien_id' => $horaire->praticien_id])
                         ->with('status', 'Demande de rendez-vous effectuée avec succès.');
    }

    public function confirmAppointment($id)
    {
        $rendezvous = Rendezvouss::findOrFail($id);
        $praticien = $rendezvous->praticien;
        $patient = $rendezvous->patient;

        if ($rendezvous) {
            $rendezvous->status = 'confirmé';
            $rendezvous->save();

            // Ajouter le patient à la liste des patients du praticien
            if (!$praticien->patients->contains($patient->id)) {
                $praticien->patients()->attach($patient->id);
            }

            return redirect()->route('praticien.view')->with('status', 'Rendez-vous confirmé avec succès.');
        } else {
            return redirect()->route('praticien.view')->with('error', 'Rendez-vous non trouvé.');
        }
    }
}
