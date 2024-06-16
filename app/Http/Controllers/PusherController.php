<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\PusherBroadcast;
use Exception;

class PusherController extends Controller
{
    public function index()
    {
        return view('pusher.index');
    }

    public function broadcast(Request $request)
    {
        try {
            // Validation des données de la requête
            $request->validate([
                'message' => 'required|string|max:255',
            ]);

            // Diffuser l'événement
            broadcast(new PusherBroadcast($request->get('message')))->toOthers();

            // Retourner une réponse JSON
            return response()->json(['status' => 'Message broadcasted', 'message' => $request->get('message')]);
        } catch (Exception $e) {
            // Log the exception message
            \Log::error('Error broadcasting message: ' . $e->getMessage());

            // Return a JSON error response
            return response()->json(['error' => 'Internal Server Error'], 500);
        }
    }

    public function receive(Request $request)
    {
        // Validation des données de la requête
        $request->validate([
            'message' => 'required|string|max:255',
        ]);

        return view('pusher.receive', ['message' => $request->get('message')]);
    }


    // information pusher 2
    




}
