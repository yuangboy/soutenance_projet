<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Video;

class VideoController extends Controller
{
    public function upload(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'video' => 'required|file|mimetypes:video/webm,video/mp4|max:10240', // Taille maximale de 10 Mo
        ]);

        $videoData = file_get_contents($request->file('video')->getRealPath());

        $video = new Video();
        $video->title = $request->input('title');
        $video->description = $request->input('description');
        $video->video_data = $videoData;

        // Debugging: Afficher les informations de la vidéo avant la sauvegarde
        dd($video);

        $video->save();

        return response()->json(['message' => 'Video uploaded successfully']);
    }

    public function index()
    {
        $videos = Video::all();
        return view('videos.index', compact('videos'));
    }

    public function show($id)
    {
        $video = Video::findOrFail($id);
        return response()->make($video->video_data, 200, [
            'Content-Type' => 'video/mp4',
            'Content-Disposition' => 'inline; filename="video.mp4"',
        ]);
    }
}
