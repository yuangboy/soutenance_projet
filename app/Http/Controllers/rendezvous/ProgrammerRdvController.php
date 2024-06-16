<?php

namespace App\Http\Controllers\rendezvous;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\Services;
use App\Models\User;
use App\Models\Patient;
use App\Models\Praticien;
use App\Models\Personne;
use App\Models\RendezVous;
use App\Models\Image;
use Faker\Provider\ar_EG\Person;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use App\Notifications\CreatePersonneNotification;
use Dompdf\Dompdf;
use Illuminate\Support\Facades\Response;
use Milon\Barcode\DNS2D;
use App\Rules\patient\RegistrePatientRule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

// Milon\Barcode\Facades


class ProgrammerRdvController extends Controller
{



    // Emploi du temps praticiens

    public function afficherRdv($praticienId){
     $rendezvous=RendezVous::where('praticiens_id',$praticienId)->get();
     return view('patient.frontad.afficher-rdv',compact('rendezvous'));

    }

    //Patient & Personne
    public function praticienP(Request $request)
    {
        //    $praticien=Praticien::with('personnes')->get();
        // $p=Praticien::find(1);
        // $praticien=$p->personnes;


        $value = true;
        $praticien = Praticien::query()->when($value, function ($query) {
            return $query->where('id', '>', 2);
        })->get();

        if ($praticien) {
            return response()->json($praticien);
        }

    }


    //    Pdf Génération

    public function invoice(Request $request)
    {



        // return $request->user()->downloadInvoice($id);
        // return PDF::loadView('invoices.pdf', compact('invoice'))->download('invoice.pdf');

        // Générer le contenu HTML du PDF à partir de la vue 'invoices.pdf' avec les données de la facture
        $html = view('patient.vuePdf')->render();
        $domPdf = new Dompdf();
        $domPdf->loadHtml($html);
        $domPdf->setPaper('A4', 'portrait');
        $domPdf->render();
        $domPdf->stream('invoice.pdf');
        return $domPdf->output();

        // Télécharger le PDF avec un nom de fichier spécifié
        // return $dompdf->stream('invoice.pdf');
    }

    public function indexFormations()
    {
        $services = Services::all();
        return view('patient.vueAjax', compact('services'));
    }

    public function suggestions(Request $request)
    {

        $saisie = $request->input('saisie');

        // Effectuez la logique pour récupérer les suggestions depuis la base de données
        $suggestions = Services::where('libelle', 'LIKE', '%' . $saisie . '%')->pluck('libelle');

        // Retournez les suggestions sous forme de réponse JSON
        return response()->json($suggestions);
        // return view('patient.vueAjax');

    }


    public function getPatientInfo()
    {
        // Récupérer les informations du patient authentifié
        $patient = Auth::user();

        // Retourner la vue avec les informations du patient
        return view('patient.rdvProgramme', ['patientInfo' => $patient]);
    }






    // public function getRdv(Request $request){

    //     $user=new User();
    //     $user->name=$request->input('nom');
    //     $user->email=$request->input('email');
    //     $user->save();

    // }

    public function recupRegistrePatient(Request $request)
    {
          // Récupérer les données du formulaire 1 depuis la session
       $form1Data = session('form1_data');

        return view('patient.dashboard',compact('form1Data'));
    }

    public function StorePatient(Request $request)
    {
        // Valider les données du formulaire
        $request->validate([
            'image' => 'required',
            'prenom' => 'required',
            'dateNaiss' => 'required',
            'genre' => 'required',
            'tel' => 'required',
            'profession' => 'required',
            'adresse' => 'required',
            'nationalite' => 'required',
            'ville' => 'required',
            'lieuNaiss' => 'required',
            'sitmatrimoniale' => 'required',

        ]);

        // Vérification des données de la session
        $form1Data = session('form1_data');
        if (!$form1Data) {
            Log::error('Les données du formulaire 1 sont manquantes.');
            return redirect()->back()->withErrors('Les données du formulaire 1 sont manquantes.');
        }

        DB::beginTransaction();

        try {
            // Création de l'utilisateur
            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // Génération du matricule unique
            do {
                $mat = random_int(0, 999999);
                $matricule = "PA2024" . str_pad($mat, 6, '0', STR_PAD_LEFT);
                $compareMatricule = Patient::where('matricule', $matricule)->exists();
            } while ($compareMatricule);

            // Création du patient
            $patient = Patient::create([
                'user_id' => $user->id,
                'matricule' => $matricule,
                'prenom' => $request->prenom,
                'dateNaiss' => $request->dateNaiss,
                'genre' => $request->genre,
                'tel' => $request->tel,
                'profession' => $request->profession,
                'adresse' => $request->adresse,
                'lieuNaiss' => $request->lieuNaiss,
                'ville' => $request->ville,
                'sitmatrimoniale' => $request->sitmatrimoniale,
                'nationalite' => $request->nationalite,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            DB::commit();

            // Effacer les données du formulaire 1 de la session
            session()->forget('form1_data');

            // Rediriger vers une page de succès
            return redirect()->route('message.success')->with('success', 'Patient créé avec succès.');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Erreur lors de la création du patient : ' . $e->getMessage());
            return redirect()->back()->withErrors('Erreur lors de la création du patient.');
        }
    }

//     public function StorePatient(Personne $personne, Request $request)
//     {
//         // Valider les données du formulaire
//         // $request->validate([
//         //     'nom' => ['required', new RegistrePatientRule],
//         //     'prenom' => ['required', new RegistrePatientRule],
//         //     'dateNaiss' => ['required', new RegistrePatientRule],
//         //     'email' => ['required', new RegistrePatientRule],
//         //     'profession' => ['required', new RegistrePatientRule],
//         //     'adresse' => ['required', new RegistrePatientRule],
//         //     'lieuNaiss' => ['required', new RegistrePatientRule],
//         //     'nationalite' => ['required'],
//         //     'genre' => ['required']
//         // ]);

//             // Récupérer les données du formulaire 1 depuis la session
//      $form1Data = session('form1_data');

//     if ($form1Data) {
//          $user = User::create([
//             'name' => $request->name,
//             'email' => $request->email,
//             'password' => Hash::make($request->password),
//         ]);

//        // Génération du matricule unique
//        do {
//         $mat = random_int(000000, 999999);
//         $matricule = "PA2024" . $mat;
//         $compareMatricule = Patient::where('matricule', $matricule)->exists();
//     } while ($compareMatricule);


//         $patient = Patient::create([
//             // 'nom' => $request->nom,
//             'user_id'=>$user->id,
//             'matricule' => $matricule,
//             'prenom' => $request->prenom,
//             'dateNaiss' => $request->daten,
//             'genre' => $request->genre,
//             'tel' => $request->tel,
//             'profession' => $request->profession,
//             'adresse' => $request->adresse,
//             'lieuNaiss' => $request->lieuNaiss,
//             'ville' => $request->ville,
//             'sitmatrimoniale' => $request->sitmatrimoniale,
//             // 'email' => $request->email,
//             'nationalite' => $request->nationalite,
//             'created_at' => now(),
//             'updated_at' => now(),

//         ]);


//         // Effacer les données du formulaire 1 de la session
//         session()->forget('form1_data');

//         //  $qrcode=DNS2D::getBarcodeHTML($personne,'QRCODE');
//         // {!! DNS2D::getBarcodeHTML($patient->codep, 'QRCODE',5,5) !!}

//         // Recupération du logo




//     $imagePath=public_path('frontend/assets/img/logoSoutenace.png');
//         // $imagePath=storage_path('app/public/images/logoSoutenace.png');
//     $imageSearch=base64_encode(file_get_contents($imagePath));
//     $imageVue = '<img src="data:image/jpeg;base64,' . $imageSearch . '" alt="Image">';

//         $images = Image::all();
//         $html=view('pdf.patient.registrepatient',compact('patient','user','images'))->render();
//         $domPdf = new Dompdf();
//         $domPdf->loadHtml($html);
//         $domPdf->setPaper('A4', 'portrait');
//         $domPdf->render();



//          // Générer le PDF et le stocker dans un fichier
//         //  $output = $domPdf->output();
//         //  $filePath = storage_path('app/fichierPdf/' . $personne->id . '.pdf');
//         //  file_put_contents($filePath, $output);


//              // Génération du PDF
//               $output = $domPdf->output();


//         // Ajouter une notification de session après la génération du PDF
//           session()->flash('success', 'PDF généré avec succès.');

//               // Création de la réponse de téléchargement
//         return Response::make($output, 200, [
//             'Content-Type' => 'application/pdf',
//             'Content-Disposition' => 'attachment; filename="personne_' . $user->id . '.pdf"',
//         ]);
//     }

//     return redirect()->back();
//  // Rediriger vers une page définie
// //  return redirect('/confirmation-page')->with('message', 'Personne créée et PDF généré');




//         // $domPdf = new Dompdf();
//         // $domPdf->loadHtml($personne);
//         // $domPdf->setPaper('A4', 'portrait');
//         // $domPdf->render();
//         // $domPdf->stream('invoice.pdf');
//         // return $domPdf->output();
//         // return redirect('/gg');


//           // if($personne){
//                 //     $personne->notify(new CreatePersonneNotification());
//                 // }
//                 // return response('personne créé !!');

//     }


    public function editPatient($id)
    {
        $personne = Personne::find($id);
        return view('patient.edit', compact('personne'));
    }

    public function UpdatePatient(Request $request, $id)
    {

        $personne = Personne::find($id);
        $personne->update([
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'dateNaiss' => $request->daten,
            'genre' => $request->genre,
            'tel' => $request->tel,
            'profession' => $request->profession,
            'adresse' => $request->adresse,
            'sitmatrimoniale' => $request->sitmatrimoniale,
            'email' => $request->email,
            'nationalite' => $request->nationalite,
            'ville' => $request->ville
        ]);

        return redirect('/gg');
    }

    public function deletePatient(Personne $personne)
    {
        $personne->delete();

        // return redirect('/gg');

    }

    public function ProgrammeDeconnexion()
    {
        Session()->flush();
        Auth::logout();
        return response("deconnexion reussie");
    }

    public function Programme(Request $request)
    {
        $searchService = null;

        if (!empty($request->search)) {

            $searchService = Services::where('libelle', 'like', '%' . $request->search . '%')->paginate(10);
        } else {
            $searchService = Services::paginate(10);
        }

        $users = $request->user();


        return view(
            'patient.rdvProgramme',
            [
                'searchService' => $searchService,
                'users' => $users
            ]
        );
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
    $praticiens = collect(); // Initialize as an empty collection by default

    if (!empty($request->search)) {
        // Search for the service
        $searchService = Services::where('libelle', 'like', '%' . $request->search . '%')->first();

        if ($searchService) {
            // Retrieve practitioners associated with the found service
            $praticiens = Praticien::where('service_id', $searchService->id)->get();
        }
    } else {
        // Retrieve all practitioners (or handle as needed if no search term is provided)
        $praticiens = Praticien::all();
    }
    
    return view('patient.frontad.servprati', compact('searchService', 'praticiens'));
}

    public function AA(Request $request)
    {

        // $services = Services::find(1);
        // $praticiens=$services->praticien;


        // $service=Services::with('praticiens')->first();
        // $praticiens=$service->praticien;

        $praticiens = Praticien::whereIn('service_id', [1])->get();
        return view('patient.headRdv', compact('praticiens'));
    }
}

// D'accord, voici comment vous pouvez définir les modèles Praticien et Service :

// Modèle Praticien (Praticien.php)
// php
// Copy code
// <?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Model;

// class Praticien extends Model
// {
//     protected $table = 'praticiens';

//     protected $fillable = ['nom', 'prenom', 'email', 'service_id'];

//     public function service()
//     {
//         return $this->belongsTo(Service::class);
//     }
// }
// Modèle Service (Service.php)
// php
// Copy code
// <?php

// namespace App\Models;

// use Illuminate\Database\Eloquent\Model;

// class Service extends Model
// {
//     protected $table = 'services';

//     protected $fillable = ['libelle'];

//     public function praticiens()
//     {
//         return $this->hasMany(Praticien::class);
//     }
// }
