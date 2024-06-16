<?php

namespace App\Http\Controllers\images;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Storage;
use App\Models\Patient;
use App\Models\User;

class ImageController extends Controller
{

// Enregistrement de l'image debut

public function showForm()
{
    return view('images.test.upload');
}


//



public function Postupload(Request $request)
{
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

   

    $path = $request->file('image')->storeAs('temp_images');

    if ($path) {
        session()->flash('success', 'Image uploaded successfully!');
        session()->flash('imagePath', $path);
    } else {
        session()->flash('error', 'Image upload failed!');
    }

    return redirect()->route('image.form');
}


public function confirm(Request $request)
{
    $imagePath = $request->input('imagePath');
    $finalPath = 'images/' . basename($imagePath);

    // Récupérer l'enregistrement de la base de données à mettre à jour
    $record = Patient::find(109); // Changez l'ID pour celui de votre enregistrement cible

    // Supprimer l'ancienne image si elle existe
    if ($record->image && Storage::exists($record->image)) {
        Storage::delete($record->image);
    }

    // Déplacer l'image à son emplacement final
    Storage::move($imagePath, $finalPath);

    // Mettre à jour l'enregistrement avec le nouveau chemin de l'image
    $record->image = $finalPath;
    $record->save();

    return redirect()->route('image.form')->with('message', 'Image téléchargée avec succès!');
}



// fin enregristrement de l'image







  // fiche patient

   public function FichePatient(Request $request){
     $fiche=session('mon_dompdf');

           // Création de la réponse de téléchargement
    return Response::make($fiche, 200, [
        'Content-Type' => 'application/pdf',
        'Content-Disposition' => 'attachment; filename="patient_' . '' . '.pdf"',
    ]);

   }
    public function upload(Request $request)
    {

        // Valider le fichier d'image
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Obtenir le fichier d'image
        $image = $request->file('image');

        // Convertir l'image en base64
        $imageBase64 = base64_encode(file_get_contents($image));

        // Créer une nouvelle instance du modèle Image
        $imageModel = new Image();
        // Affecter le nom original du fichier à la propriété name
        $imageModel->name = $image->getClientOriginalName();
        // Affecter l'image en base64 à la propriété image
        $imageModel->image = $imageBase64;
        // Sauvegarder l'instance dans la base de données
        $imageModel->save();

        // Retourner avec un message de succès
        return back()->with('success', 'Image uploaded successfully');
    }

    public function show()
    {
        // Récupérer toutes les images de la base de données
        $images = Image::all();
        // Passer les images à la vue profile.blade.php
        return view('pdf.patient.registrepatient', compact('images'));
    }
}