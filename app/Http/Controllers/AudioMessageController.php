<?php
// app/Http/Controllers/AudioMessageController.php
namespace App\Http\Controllers;

use App\Models\AudioMessage;
use App\Models\Rendezvouss;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class AudioMessageController extends Controller
{
    public function index($rendezvousId)
    {
        $rendezvous = Rendezvouss::findOrFail($rendezvousId);
        $this->authorize('view', $rendezvous);

        $audioMessages = $rendezvousses->audioMessages()->with('sender')->get();

        return view('audio_messages.index', compact('audioMessages', 'rendezvousses'));
    }

    public function store(Request $request, $rendezvoussesId)
    {
        $request->validate([
            'audio' => 'required|mimes:audio/mpeg,mpga,mp3,wav,aac'
        ]);

        $rendezvousses = Rendezvouss::findOrFail($rendezvoussesId);
        $this->authorize('view', $rendezvousses);

        $filePath = $request->file('audio')->store('audio_messages');

        AudioMessage::create([
            'rendezvous_id' => $rendezvousId,
            'sender_id' => Auth::id(),
            'file_path' => $filePath
        ]);

        return redirect()->back()->with('success', 'Audio message sent successfully.');
    }

    public function destroy($id)
    {
        $audioMessage = AudioMessage::findOrFail($id);
        $this->authorize('delete', $audioMessage);

        Storage::delete($audioMessage->file_path);
        $audioMessage->delete();

        return redirect()->back()->with('success', 'Audio message deleted successfully.');
    }

    public function play($id)
    {
        $audioMessage = AudioMessage::findOrFail($id);
        $this->authorize('view', $audioMessage->rendezvousses);

        $filePath = $audioMessage->file_path;
        if (!Storage::exists($filePath)) {
            abort(404);
        }

        $fileContents = Storage::get($filePath);
        $mimeType = Storage::mimeType($filePath);

        return response($fileContents, 200)
            ->header('Content-Type', $mimeType);
    }
}
