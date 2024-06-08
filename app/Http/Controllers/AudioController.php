<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

class AudioController extends Controller
{
    //
     public function showRecordAudioForm()
    {
        return view('frenteprati.audio');
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
