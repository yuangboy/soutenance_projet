<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Events\PusherBroadcast;
use App\Events\PrivateMessageBroadcast;
use Exception;
use App\Models\User;
use Pusher\Pusher;
use Illuminate\Support\Facades\Auth;

class PusherController2 extends Controller
{
    public function index()
    {

        $recipient = User::where('role', 'praticien')->first(); // ou selon la logique pour sélectionner le destinataire

        return view('pusher2.index',compact('recipient'));
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


    public function sendPrivateMessage(Request $request)
{
    // Validation des données de la requête
    $request->validate([
        'message' => 'required|string|max:255',
        'recipient_id' => 'required|integer|exists:users,id',
    ]);

    // Diffuser l'événement à un canal privé
    broadcast(new PrivateMessageBroadcast($request->user()->id, $request->recipient_id, $request->message))->toOthers();

    // Retourner une réponse JSON
    return response()->json(['status' => 'Message sent', 'message' => $request->get('message')]);
}

public function authenticate(Request $request)
    {
        if (Auth::check()) {
            $pusher = new Pusher(
                config('broadcasting.connections.pusher.key'),
                config('broadcasting.connections.pusher.secret'),
                config('broadcasting.connections.pusher.app_id'),
                [
                    'cluster' => config('broadcasting.connections.pusher.options.cluster'),
                    'useTLS' => true
                ]
            );

            $socketId = $request->socket_id;
            $channelName = $request->channel_name;
            $auth = $pusher->socket_auth($channelName, $socketId);

            return response($auth);
        } else {
            return response('Forbidden', 403);
        }
    }



}