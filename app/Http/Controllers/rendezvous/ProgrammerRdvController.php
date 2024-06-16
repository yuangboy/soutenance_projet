<?php

namespace App\Http\Controllers\rendezvous;

use App\Notifications\fichePatientNotification;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Services;
use App\Models\User;
use App\Models\Patient;
use App\Models\Praticien;
use App\Models\Personne;
use App\Models\RendezVous;
use App\Models\Image;
use Illuminate\Http\Request;
use Dompdf\Dompdf;

use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Mail;

class ProgrammerRdvController extends Controller
{

    // Emploi du temps praticiens
    public function afficherRdv($praticienId)
    {
        $rendezvous = RendezVous::where('praticiens_id', $praticienId)->get();
        return view('patient.frontad.afficher-rdv', compact('rendezvous'));
    }

    // Patient & Personne
    public function praticienP(Request $request)
    {
        $value = true;
        $praticien = Praticien::query()->when($value, function ($query) {
            return $query->where('id', '>', 2);
        })->get();

        if ($praticien) {
            return response()->json($praticien);
        }
    }

    // PDF Génération
    public function invoice(Request $request)
    {
        $html = view('patient.vuePdf')->render();
        $domPdf = new Dompdf();
        $domPdf->loadHtml($html);
        $domPdf->setPaper('A4', 'portrait');
        $domPdf->render();
        $domPdf->stream('invoice.pdf');
        return $domPdf->output();
    }

    public function indexFormations()
    {
        $services = Services::all();
        return view('patient.vueAjax', compact('services'));
    }

    public function suggestions(Request $request)
    {
        $saisie = $request->input('saisie');
        $suggestions = Services::where('libelle', 'LIKE', '%' . $saisie . '%')->pluck('libelle');
        return response()->json($suggestions);
    }

    public function getPatientInfo()
    {
        $patient = Auth::user();
        return view('patient.rdvProgramme', ['patientInfo' => $patient]);
    }

    public function recupRegistrePatient(Request $request)
    {
          // Récupérer les données du formulaire 1 depuis la session
       $form1Data = session('form1_data');

        return view('patient.dashboard',compact('form1Data'));
    }

    // public function StorePatient(Request $request)
    // {
    //     // Valider les données du second formulaire
    //     // $request->validate([
    //     //     'prenom' => 'required',
    //     //     'daten' => 'required|date',
    //     //     'genre' => 'required',
    //     //     'tel' => 'required',
    //     //     'profession' => 'required',
    //     //     'adresse' => 'required',
    //     //     'nationalite' => 'required',
    //     //     'ville' => 'required',
    //     //     'lieuNaiss' => 'required',
    //     //     'sitmatrimoniale' => 'required',
    //     // ]);

    //     // Récupérer les données du premier formulaire depuis la session
    //     $form1Data = session('form1_data');

    //     // Vérifier si les données de la session existent
    //     if (!$form1Data) {
    //         Log::error('Les données du formulaire 1 sont manquantes.');
    //         return redirect()->back()->withErrors('Les données du formulaire 1 sont manquantes.');
    //     }

    //     try {
    //         // Création de l'utilisateur
    //         $user = new User();
    //         $user->name = $form1Data['name'];
    //         $user->email = $form1Data['email'];
    //         $user->password = Hash::make($form1Data['password']);
    //         $user->save();

    //         // Génération du matricule unique pour le patient
    //         do {
    //             $mat = random_int(0, 999999);
    //             $matricule = "PA2024" . str_pad($mat, 6, '0', STR_PAD_LEFT);
    //         } while (Patient::where('matricule', $matricule)->exists());

    //         // Création du patient
    //         $patient = new Patient();
    //         $patient->user_id = $user->id;
    //         $patient->image = 'Rien';
    //         $patient->matricule = $matricule;
    //         $patient->prenom = $request->prenom;
    //         $patient->dateNaiss = $request->daten;
    //         $patient->genre = $request->genre;
    //         $patient->tel = $request->tel;
    //         $patient->profession = $request->profession;
    //         $patient->adresse = $request->adresse;
    //         $patient->lieuNaiss = $request->lieuNaiss;
    //         $patient->ville = $request->ville;
    //         $patient->sitmatrimoniale = $request->sitmatrimoniale;
    //         $patient->nationalite = $request->nationalite;
    //         $patient->save();

    //         // Effacer les données du formulaire 1 de la session après récupération
    //         session()->forget('form1_data');

    //         // Génération du PDF
    //         $html = view('pdf.patient.registrepatient', compact('patient', 'user'))->render();
    //         $domPdf = new Dompdf();
    //         $domPdf->loadHtml($html);
    //         $domPdf->setPaper('A4', 'portrait');
    //         $domPdf->render();
    //         $output = $domPdf->output();

    //         // Ajouter une notification de session après la génération du PDF
    //         session()->flash('success', 'PDF généré avec succès.');

    //         // Création de la réponse de téléchargement
    //         return Response::make($output, 200, [
    //             'Content-Type' => 'application/pdf',
    //             'Content-Disposition' => 'attachment; filename="personne_' . $patient->matricule . '.pdf"',
    //         ]);
    //     } catch (\Exception $e) {
    //         // Gérer les exceptions et les erreurs
    //         Log::error('Erreur lors de la création de l\'utilisateur ou du patient: ' . $e->getMessage());
    //         return redirect()->back()->withErrors('Erreur lors de la création de l\'utilisateur ou du patient.');
    //     }
    // }

// nouvelle methode store projetSoutenanceV22A

public function StorePatient(Personne $personne, Request $request)
{
    // Valider les données du formulaire
    // $request->validate([
    //     'nom' => ['required', new RegistrePatientRule],
    //     'prenom' => ['required', new RegistrePatientRule],
    //     'dateNaiss' => ['required', new RegistrePatientRule],
    //     'email' => ['required', new RegistrePatientRule],
    //     'profession' => ['required', new RegistrePatientRule],
    //     'adresse' => ['required', new RegistrePatientRule],
    //     'lieuNaiss' => ['required', new RegistrePatientRule],
    //     'nationalite' => ['required'],
    //     'genre' => ['required']
    // ]);

    $form1Data = session('form1_data');

        if(!$form1Data){
            response()->json(['message'=>'retourne remplier form1']);
        }

        do{
            $mat=random_int(0000000,9999999);
            $matri="PA2024".$mat;
            $verifMatricule=Patient::where('matricule',$matri)->exists();
        }while($verifMatricule);

                $user = new User();
                $user->name = $form1Data['name'];
                $user->email = $form1Data['email'];
                $user->password = Hash::make($form1Data['password']);
                $user->save();


       $patient = Patient::create([
        'user_id'=>$user->id,
        'matricule'=>$matri,
        'image'=>'Rien',
        'ville' => $request->ville,
        'prenom' => $request->prenom,
        'dateNaiss' => $request->daten,
        'genre' => $request->genre,
        'tel' => $request->tel,
        'profession' => $request->profession,
        'adresse' => $request->adresse,
        'lieuNaiss' => $request->lieuNaiss,
        'sitmatrimoniale' => $request->sitmatrimoniale,
        'email' => $request->email,
        'nationalite' => $request->nationalite,
        // 'ville' => $request->ville
    ]);



    //  $qrcode=DNS2D::getBarcodeHTML($personne,'QRCODE');
    // {!! DNS2D::getBarcodeHTML($patient->codep, 'QRCODE',5,5) !!}

    // Recupération du logo

   // Génération du matricule unique

$imagePath=public_path('frontend/assets/img/logoSoutenace.png');
    // $imagePath=storage_path('app/public/images/logoSoutenace.png');
$imageSearch=base64_encode(file_get_contents($imagePath));
$imageVue = '<img src="data:image/jpeg;base64,' . $imageSearch . '" alt="Image">';


    // Récupérer toutes les images de la base de données
    $images = Image::all();


    $html=view('pdf.patient.registrepatient',compact('user','patient','images'))->render();
    $domPdf = new Dompdf();
    $domPdf->loadHtml($html);
    $domPdf->setPaper('A4', 'portrait');
    $domPdf->render();



         // Génération du PDF
          $output = $domPdf->output();


          // Générer le PDF et le stocker dans un fichier
          $output = $domPdf->output();
         $filePath = storage_path('app/fichierPdf/' . $patient->id . '.pdf');
         file_put_contents($filePath, $output);

         $data = [
            'filePath' => $filePath,
            'matricule' => $patient->matricule,
        ];
        



         Notification::route('mail', 'albinmpobo@gmail.com')->notify(new fichePatientNotification($patient,$data));




    //       Session::put('mon_dompdf',$request->only('patient','output'));
    // $name=$user->name;

    // Ajouter une notification de session après la génération du PDF
      session()->flash('success', 'PDF généré avec succès.');

      return redirect()->intended('login');

          // Création de la réponse de téléchargement
    // return Response::make($output, 200, [
    //     'Content-Type' => 'application/pdf',
    //     'Content-Disposition' => 'attachment; filename="patient_' . $patient->matricule . '.pdf"',
    // ]);


}


    public function prendreRendezVous(Request $request)
    {
        // Valider les données du formulaire (à faire)

        // Enregistrer le rendez-vous dans la base de données
        // $rendezVous = new RendezVous();
        // $rendezVous->motif = $request->motif;
        // $rendezVous->date = $request->date;
        // $rendezVous->heure = $request->heure;
        // $rendezVous->praticiens_id = $request->praticien_id; // À remplacer par le champ approprié
        // $rendezVous->save();

        // Redirection avec un message de succès (à faire)
    }

    public function ProgrammeRdv(Request $request)
    {
        $searchService = null;
        $praticiens = collect();

        if (!empty($request->search)) {
            $searchService = Services::where('libelle', 'like', '%' . $request->search . '%')->first();

            if ($searchService) {
                $praticiens = Praticien::where('service_id', $searchService->id)->get();
            }
        } else {
            $praticiens = Praticien::all();
        }

        return view('patient.frontad.servprati', compact('searchService', 'praticiens'));
    }

    public function AA(Request $request)
    {
        $praticiens = Praticien::whereIn('service_id', [1])->get();
        return view('patient.headRdv', compact('praticiens'));
    }
}