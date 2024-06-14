<?php

namespace App\Http\Controllers\images;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Image;
use Illuminate\Support\Facades\Response;

class ImageController extends Controller
{

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