<?php

namespace App\Http\Controllers\Admin\patient;

use App\Http\Controllers\Controller;
use App\Models\Praticien;
use App\Models\Service;
use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use App\Events\MyEvents;

// class YourController extends Controller
// {
//     public function yourMethod()
//     {
//         // Diffuser l'événement
//         event(new MyEvents('hello world'));

//         // Autres actions...
//     }
// }

class AdpaController extends Controller
{

    // public function yourMethod()
    // {
    //     // Diffuser l'événement
    //     event(new MyEvents('hello world'));

    //     // Autres actions...
    // }


    // creation praticien
    public function createPraticien(){
        $service=Service::all();
        return view('admin.praticien.create',compact('service'));
    }

    public function storePraticien(Request $request)
    {
        $request->validate([
            'prenom' => 'required',
            'dateNaiss' => 'required',
            'genre' => 'required',
            'tel' => 'required',
            'profession' => 'required',
            'adresse' => 'required',
            'lieuNaiss' => 'required',
            'ville' => 'required',
            'sitmatrimoniale' => 'required',
            'pays' => 'required',
            'specialite' => 'required',
            'service_id' => 'required',
        ]);

        $formUser = Session::get('user_data');

        if (!$formUser) {
            return redirect()->route('create.role');
        }

        do {
            $matr = random_int(0000000, 9999999);
            $matricu = "PRA2024" . $matr;
            $matricule = Praticien::where('mattricule', $matricu)->exists();
        } while ($matricule);

        $user = User::create([
            'name' => $formUser['name'],
            'email' => $formUser['email'],
            'role' => $formUser['role'],
            'status' => $formUser['status'],
            'password' => Hash::make($formUser['password']),
        ]);

        $praticien = Praticien::create([
            'user_id' => $user->id,
            'mattricule' => $matricu,
            'image' => 'Rien',
            'tel' => $request->tel,
            'ville'=>$request->ville,
            'dateNaiss' => $request->dateNaiss,
            'lieuNaiss' => $request->lieuNaiss,
            'genre' => $request->genre,
            'profession' => $request->profession,
            'prenom' => $request->prenom,
            'service_id' => $request->service_id,
            'specialite' => $request->specialite,
            'pays' => $request->pays,
            'sitmatrimoniale' => $request->sitmatrimoniale,
            'adresse' => $request->adresse,
        ]);

        Session::forget('user_data');

        return redirect()->route('attribution.role');
    }


// creation patient

    public function createPatient (){
        return view('admin.patient.create');
    }

    // Créer un patient

    public function storePatient(Request $request){

        $request->validate([

            'prenom' => 'required',
            'daten' => 'required',
            'genre' => 'required',
            'tel' => 'required',
            'profession' => 'required',
            'adresse' => 'required',
            'lieuNaiss' => 'required',
            'ville' => 'required',
            'sitmatrimoniale' => 'required',
            'nationalite' => 'required',
        ]);

        if(!$request){
            return response("error");
        }

        do{
            $mat=random_int(1000000,9999999);
            $mate='PA2024'.$mat;
            $setMAtricule=Patient::where('matricule',$mate)->first();
        }while($setMAtricule);

        $getSession=Session::get('user_data');

        $users=User::create([
           'name'=>$getSession['name'],
           'email'=>$getSession['email'],
           'role'=>$getSession['role'],
           'status'=>$getSession['status'],
           'password'=>Hash::make($getSession['password']),
        ]);


        $patient = Patient::create([
            "image"=>'Rien',
            'user_id' => $users->id,
            'matricule' => $mate,
            'prenom' => $request->prenom,
            'dateNaiss' => $request->daten,
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

         Session::forget('user_data');


        return redirect()->route('patient.dashboard')->with('success', 'Patient ajouter avec succes');

    }


}