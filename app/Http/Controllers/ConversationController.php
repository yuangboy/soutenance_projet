<?php

// app/Http/Controllers/ConversationController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conversation;
use App\Models\User;
use App\Models\AudioMessage;
use App\Models\Praticien;
use Auth;

class ConversationController extends Controller
{
    /*public function index()
    {
        $user = Auth::user();

        // Assurez-vous de bien vérifier le type de l'utilisateur
        if ($user instanceof \App\Models\praticien) {
            $conversations = $user->conversations()->with('patient')->get();
        } elseif ($user instanceof \App\Models\Patient) {
            $conversations = $user->conversations()->with('practitioner')->get();
        } else {
            $conversations = collect();
        }

        return view('conversations.index', compact('conversations'));
    }

    public function show(Conversation $conversation)
    {
        $this->authorize('view', $conversation);

        $conversation->load('audioMessages');

        return view('conversations.show', compact('conversation'));
    }*/
   public function index()
    {
        $user = Auth::user();
        $conversations = Conversation::where('praticien_id', $user->id)
                                     ->orWhere('patient_id', $user->id)
                                     ->get();
        if ($user->praticien) {
            $patients = $user->praticien->patients;
            return view('conversations.index', compact('patients','conversations'));
        } elseif ($user->patient) {
            $praticiens = $user->patient->praticiens;
            return view('conversations.index', compact('praticiens'));
        } else {
            return view('conversations.index')->with('message', 'No praticien or patients found.');
        }
    }
     /*public function index()
    {
        $user = Auth::user();
        $conversations = Conversation::where('praticien_id', $user->id)
                                     ->orWhere('patient_id', $user->id)
                                     ->get();

        return view('conversations.index', compact('conversations'));
    }
*/
    public function show($id)
    {
        $conversation = Conversation::with('audioMessages')->findOrFail($id);
        return view('conversations.show', compact('conversation'));
    }
   
   /* public function show($id)
    {
        $user = Auth::user();
        $conversation = Conversation::find($id);

        if ($user->praticien && $conversation->praticien_id == $user->praticien->id ||
            $user->patient && $conversation->patient_id == $user->patient->id) {
            $conversation->load('audioMessages');
            return view('conversations.show', compact('conversation'));
        }

        abort(403, 'Unauthorized action.');
    }*/

    public function create(Request $request)
    {
        $user = Auth::user();
        $patientId = $request->input('patient_id');
        $praticienId = $request->input('praticien_id');

        if ($user->praticien) {
            $conversation = Conversation::create([
                'praticien_id' => $user->praticien->id,
                'patient_id' => $patientId
            ]);
        } elseif ($user->user) {
            $conversation = Conversation::create([
                'praticien_id' => $praticienId,
                'patient_id' => $user->patient->id
            ]);
        }

        return redirect()->route('conversations.show', ['conversation' => $conversation->id]);
    }

    public function upload(Request $request)
    {
        if ($request->hasFile('audio')) {
            $file = $request->file('audio');
            $filename = 'audio_' . time() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('audios', $filename);

            return response()->json(['message' => 'Audio uploaded successfully']);
        }

        return response()->json(['message' => 'No audio file found'], 400);
    }
}
