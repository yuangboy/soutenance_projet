<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\User;
use App\Models\Service;
use App\Models\Praticien;
use App\Models\Patient;
use App\Models\Patientas;
use App\Models\Assurance;
use App\Models\Emplt;
use Spatie\Permission\Models\Role;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;


class AdminController extends Controller
{

    /*public function showPatient(){
        return view('frenteprati.index');
    }*/
    //*********************praticien methode*********************** */

    public function listePatients() {
    // Assurez-vous que l'utilisateur est connecté
    if (!auth()->check()) {
        return redirect()->route('login'); // Redirigez vers la page de connexion si l'utilisateur n'est pas connecté
    }

    // Récupérez l'utilisateur connecté
    $user = auth()->user();

    // Assurez-vous que l'utilisateur est un praticien
    if (!$user->praticien) {
        abort(403, 'Vous n\'êtes pas un praticien.');
    }

    // Récupérez les patients du praticien connecté
    $patients = $user->praticien->patients;

    // Retournez la vue avec la liste des patients
    return view('frenteprati.listePatients', compact('patients'));
}
    public function edit1($id) {
    $praticiens = Praticien::findOrFail($id); // Récupère le praticien par son ID

    return view('frontad.edit', compact('praticiens'));
}
public function edit2($id) {
    $patients = Patient::findOrFail($id); // Récupère le praticien par son ID

    return view('frontad.edit2', compact('patients'));
}

    public function update2(Request $request, $id)
    {
        $patient = Patient::find($id);
        $patient->update($request->all());

        return redirect('/patientad')->with('status', 'Praticien mis à jour avec succès!!!');
    }
     public function update1(Request $request, $id)
    {
        $praticien = Praticien::find($id);
        $praticien->update($request->all());

        return redirect('/user')->with('status', 'Praticien mis à jour avec succès!!!');
    }

    // Méthode pour supprimer le praticien
    public function destroy($id)
    {
        $praticien = Praticien::find($id);
        $praticien->delete();
        return redirect()->route('praticiens.index')->with('status', 'Praticien supprimé avec succès');
    }
    public function destroy2($id)
    {
        $patient = Patient::find($id);
        $patient->delete();
        return redirect('/patientad')->with('status', 'Praticien mis à jour avec succès!!!');
        #return redirect()->route('patients.index')->with('status', 'Patient supprimé avec succès');
    }
    public function empt(){
    // Accéder à l'ID du praticien lié à l'utilisateur connecté
    $praticien_id = auth()->user()->praticien->id; // Accéder à l'ID du praticien via la relation

    // Filtrer les résultats pour récupérer uniquement l'emploi du temps du praticien connecté
    $emplt = Emplt::where('praticiens_id', $praticien_id)->get();

    return view('frenteprati.tableTime', compact('emplt'));
}


    public function createTT()
    {
        $praticiens = Praticien::all();
        return view('admin.createTT', compact('praticiens'));
    }

    public function store3(Request $request)
    {
        $request->validate([
            'annee' => 'required',
            'mois' => 'required',
            'jours' => 'required',
            'heured' => 'required',
            'heuref' => 'required',
            'mattricule' => 'required',
            'specialite' => 'required',
            'praticiens_id' => 'required|integer|exists:praticiens,id',

        ]);

        // Création d'un nouveau praticien avec les données du formulaire
        Emplt::create($request->all());

        return redirect('/frontad')->with('status', 'Praticien ajouté avec succès.');
    }
    //**************************************************patient**************************************** */
    public function ajouterPatient()
    {
        $users = User::all();
        $praticiens = Praticien::all();
        return view('admin.ajouterPatient', compact('users','praticiens'));
    }

    public function store2(Request $request)
    {
        // Valider les données entrantes
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'prenom' => 'required|string|max:255',
            // Ajoutez le champ 'nom' si nécessaire
            'dateNaiss' => 'required|date',
            'genre' => 'required|string|max:10',
            'tel' => 'required|string|max:15',
            'profession' => 'required|string|max:255',
            'adresse' => 'required|string|max:255',
            'codep' => 'required|string|max:10',
            'nationalite' => 'required|string|max:255',
            'ville' => 'required|string|max:255',
            'lieuNaiss' => 'required|string|max:255',
            'sitmatrimoniale' => 'required|string|max:255',
            'user_id' => 'required|integer|exists:users,id',
            'praticien_id' => 'required|exists:praticiens,id',
        ]);

        // Gérer le téléchargement de l'image
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('uploads', 'public');
        } else {
            $imagePath = null;
        }

        // Créer le patient
        $patient = Patient::create([
            'user_id' => $request->user_id,
            'image' => $imagePath,
            'prenom' => $request->prenom,
            'dateNaiss' => $request->dateNaiss,
            'genre' => $request->genre,
            'tel' => $request->tel,
            'profession' => $request->profession,
            'adresse' => $request->adresse,
            'codep' => $request->codep,
            'nationalite' => $request->nationalite,
            'ville' => $request->ville,
            'lieuNaiss' => $request->lieuNaiss,
            'sitmatrimoniale' => $request->sitmatrimoniale,
        ]);

        // Associer le patient au praticien
        $praticien_id = $request->praticien_id;
        $patient->praticiens()->attach($praticien_id);
        return redirect('/frontad')->with('status', 'Patient ajouté avec succès.');
    }

//**************************************************patient ************************************** */

//fonction praticien ************************************************************************************************


public function roleprat()
{
    // Récupérer tous les utilisateurs ayant le rôle "praticien" et qui ne sont pas encore attribués à un praticien existant
    $praticiens = User::role('praticien')->whereDoesntHave('praticien')->get();

    return view('admin.create', compact('praticiens'));
}

    public function user(){
        $praticiens=Praticien::All();
        $users=User::All();
        return view('frontad.user', compact('praticiens','users'));

    }



public function create()
{
    // Créer le rôle "praticien" s'il n'existe pas déjà
    $role = Role::firstOrCreate(['name' => 'praticien']);

    // Récupérer les utilisateurs ayant le rôle "praticien"
    $praticiens = $role->users;

    // Récupérer les services et tous les utilisateurs (si nécessaire)
    $services = Service::all();
    $users = User::all();

    // Passer les données à la vue
    return view('admin.create', compact('services', 'users'));
}

   public function storePraticien(Request $request)
{
    // Validation des données
    $request->validate([
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'prenom' => 'required|string|max:255',
        'dateNaiss' => 'required|date',
        'genre' => 'required|string|max:255',
        'tel' => 'required|string|max:255',
        'profession' => 'required|string|max:255',
        'adresse' => 'required|string|max:255',
        'mattricule' => 'required|string|max:255',
        'specialite' => 'required|string|max:255',
        'service_id' => 'required|integer|exists:service,id',
        'user_id' => 'required|integer|exists:users,id',
    ]);

    // Si les données sont valides, procéder à la création du praticien
    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('uploads', 'public');
    }

    // Création du tableau de données
    $data = [
        'user_id' => $request->user_id,
        'image' => $imagePath,
        'prenom' => $request->prenom,
        'dateNaiss' => $request->dateNaiss,
        'genre' => $request->genre,
        'tel' => $request->tel,
        'profession' => $request->profession,
        'adresse' => $request->adresse,
        'mattricule' => $request->mattricule,
        'specialite' => $request->specialite,
        'service_id' => $request->service_id,
    ];

    // Création du praticien avec les données validées
    Praticien::create($data);

    // Rediriger l'utilisateur avec un message de succès
    return redirect('/frontad')->with('status', 'Praticien ajouté avec succès.');
}

//*************************************************************************************** */

    public function inde2(){
        return view('frenteprati.index');
    }

    public function userprofil()
    {
        return view('frontad.userprofil');
    }
    public function users()
    {
        $users = User::all();
        return view('frontad.users', compact('users'));
    }
    public function listUsers()
    {
        $users = User::all();
        return view('admin.users', compact('users'));
    }

    public function assignRole(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $user->role = $request->role;
        $user->save();

        return redirect()->route('admin.users')->with('success', 'Rôle attribué avec succès.');
    }

    public function partenaireassurance(){
        $assurances = Assurance::All();
        //$patienta = $patients::all();
        return view('frontad.partenaireassurance', compact('assurances'));

    }
    public function patientad(){
        $patients=Patient::All();
        if($patients){
            $patienta=Patientas::All();
            return view('frontad.patientad', compact('patients','patienta'));
        }
    }

    public function patientl(){
        return view('frontad.patientl');
    }
    public function index2(){
        $patients = Patient::select(\DB::raw("COUNT(*) as count"), \DB::raw("MONTH(created_at) as month"))
                            ->groupBy('month')
                            ->pluck('count', 'month');
        return view('frontad.index',compact('patients'));
    }
    public function usersp(){
        return view('frontad.userprofil');
    }
    public function dashboardprati(){
        return view('pratic/dashboardprati');
    }
    public function ajouter_service(){
        //return view('admin.ajouter');
        return view('frontad.ajouterService');
    }
    public function ajouter_service_traitement(Request $request){
        $request->validate([
        'id' => 'required',
        'libelle' => 'required',
        'description' => 'required',
        ]);

        $service = new Service();
        $service -> id = $request->id;
        $service -> libelle = $request->libelle;
        $service -> description = $request->description;
        $service->save();
        return redirect('/ajouter')->with('status', 'Service successfully added');
    }

    //ajouter assurance***********************************************************************
    public function ajouterAssurance_assuranse(){
        return view('admin.ajouterAssurance');
    }
    public function ajouterAssurance_assurance_traitement(Request $request){
        $request->validate([
        'id' => 'required',
        'nomAssure' => 'required',
        'prenomAssure' => 'required',
        'numAss' => 'required',
        'libelle' => 'required',
        'tauxPaye' => 'required',
        'beneficiaier' => 'required',
        ]);

        $assurances = new Assurance();
        $assurances -> id = $request->id;
        $assurances -> nomAssure = $request->nomAssure;
        $assurances -> prenomAssure = $request->prenomAssure;
        $assurances -> numAss = $request->numAss;
        $assurances -> libelle = $request->libelle;
        $assurances -> tauxPaye = $request->tauxPaye;
        $assurances -> beneficiaier = $request->beneficiaier;
        $assurances->save();
        return redirect('/ajouterAssurance')->with('status', 'Assurance successfully added');

    }
    public function update_services($id){
        $services = Service::find($id);
        return view('frontad.update',compact('services'));
    }

    public function update_services_traitement(Request $request){

        $request->validate([
        'libelle' => 'required',
        'description' => 'required',
        ]);

        $services = Service::find($request->id);
        $services -> libelle = $request->libelle;
        $services -> description = $request->description;
        $services->update();
       return redirect('/frontad')->with('status', 'user successfully updated');

    }
    public function updateAssurance_assurances($id){
        $assurances = Assurance::find($id);
        return view('frontad.updateAssurance',compact('assurances'));
    }
    public function updateAssurance_assurances_traitement(Request $request) {
        $validateData = $request->validate([
        'id' => 'required',
        'nomAssure' => 'required',
        'prenomAssure' => 'required',
        'numAss' => 'required',
        'libelle' => 'required',
        'tauxPaye' => 'required',
        'beneficiaier' => 'required',
        ]);
        $assurances = Assurance::find($request->id);
        $assurances -> nomAssure = $request->nomAssure;
        $assurances -> prenomAssure = $request->prenomAssure;
        $assurances -> numAss = $request->numAss;
        $assurances -> libelle = $request->libelle;
        $assurances -> tauxPaye = $request->tauxPaye;
        $assurances -> beneficiaier = $request->beneficiaier;
        $assurances->update();

        return redirect('/frontad')->with('success', 'Données mises à jour avec succès!');
    }
    public function delete_assurance($id){
        $assurances = Assurance::find($id);
        $assurances->delete();
        return redirect('/partenaireassurance')->with('status', 'Assuré supprimer avec');
    }
    //************************************************************************************************* */
    public function listService()
    {
        $service = Service::all();
        return view('admin.listeservice', compact('service'));
    }

    public function showPraticiens($id)
    {
        // Assurez-vous de récupérer un seul service par son ID
        $service = Service::with('praticiens')->findOrFail($id);
        return view('admin.praticiens', compact('service'));
    }

    public function listeserviceP(){
         $service = Service::all();
        return view('admin.listeservice',compact('service'));
    }

    public function servicead(){
         $service = Service::all();
        return view('frontad.servicead',compact('service'));
    }
    public function listepraticiensP(){
         $praticiens = Praticien::all();
        return view('admin.listepraticiensP',compact('praticiens'));
    }

    public function afficherSpecialites()
    {
        $specialites = Praticien::pluck('specialite');
        return view('frontend.index', compact('specialites'));
    }

    public function update_praticien($id){
        $praticiens = Praticien::find($id);
        return view('praticien.update',compact('praticiens'));
    }

    public function update_praticien_traitement(Request $request){
        $request->validate([
        'nom' => 'required',
        'prenom' => 'required',
        'adresse' => 'required',
        ]);
        $praticien = Praticien::find($request->id);
        $praticien -> mattricule = $request->mattricule;
        $praticien -> specialite = $request->specialite;
        $praticien -> service_id = $request->service_id;
        $praticien->update();
       return redirect('/Praticien')->with('status', 'praticien successfully updated');
    }

    public function UpdateService(Request $request, $id){
        $service = Service::find($id);

        $service -> update([
            $service => $request->id,
            $service =>$request->libelle,
            $service =>$request->description
        ]);
        return redirect('/frontad')->with('status', 'Service successfully updated');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('frontad.servicead', compact('service'));
    }
    public function update(Request $request, $id) {
        $validateData = $request->validate([
        'id' => 'required',
        'libelle' => 'required',
        'description' => 'required',
        ]);
        Service::whereId($id)->update($validateData);

        return redirect('/frontad')->with('success', 'Données mises à jour avec succès!');
    }
    public function delete_service($id){
        $service = Service::find($id);
        $service->delete();
        return redirect('/servicead')->with('status', 'Service successfully deleted');
    }

    public function service(){
         $service = Services::all();
        return view('frontend.layouts.listeservice',compact('service'));
    }

    /*public function users(){
         $users = User::all();
        return view('frontend.layouts.user',compact('users'));
    }*/

    public function updateUser_user($id){
        $users = User::find($id);
        return view('frontend.layouts.updateUser',compact('users'));
    }    public function updateUser_user_traitement(Request $request,$id){
        $request->validate([
        'name' => 'required',
        'role' => 'required',
        'status' => 'required',
        'email' => 'required',
        ]);
        // $user = User::find($id);
        $user=new User();
        $user -> name = $request->name;
        $user -> role = $request->role;
        $user -> status = $request->status;
        $user -> email = $request->email;
        $user->update($request->all());

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }



}
