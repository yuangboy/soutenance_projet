<?php
// app/Http/Controllers/AudioMessageController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AudioMessage;
use App\Models\Conversation;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class AudioMessageController extends Controller
{
    public function store(Request $request, $conversationId)
    {
        $conversation = Conversation::findOrFail($conversationId);

        $audioMessage = new AudioMessage;
        $audioMessage->conversation_id = $conversation->id;

        if ($request->hasFile('audio')) {
            $audioPath = $request->file('audio')->store('audios', 'public');
            $audioMessage->audio_path = $audioPath;
        }

        $audioMessage->sender_id = Auth::id();
        $audioMessage->sender_type = get_class(Auth::user());
        $audioMessage->save();

        return redirect()->route('conversations.show', $conversation->id);
    }
}

