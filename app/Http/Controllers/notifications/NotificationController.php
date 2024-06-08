<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Notifications\PatientNotification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    // Afficher le formulaire de notification
    public function showForm()
    {
        return view('notification_form');
    }

    // Envoyer la notification
    public function sendNotification(Request $request)
    {
        // Valider la demande
        $request->validate([
            'message' => 'required|string',
            'patient_id' => 'required|exists:users,id'
        ]);

        // Récupérer le patient
        $patient = User::find($request->patient_id);

        // Envoyer la notification
        $patient->notify(new PatientNotification($request->message));

        return response()->json(['success' => 'Notification envoyée avec succès!']);
    }
}
