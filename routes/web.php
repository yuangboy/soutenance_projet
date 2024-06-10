<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\serviceController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\praticien\pController;
use App\Http\Controllers\PraticienController;
use App\Http\Controllers\ChartController;
use App\Http\Controllers\OrdonnanceController;
use App\Http\Controllers\PDFController;
use App\Http\Controllers\images\ImageController;
//use Illuminate\Support\Facades\Route;
//use App\Http\Controllers\ProfileController;
//use App\Http\Controllers\FrontendController;
//use App\Http\Controllers\serviceController;
//use App\Http\Controllers\Admin\AdminController;
//use App\Http\Controllers\Admin\PageController;
//use App\Http\Controllers\UserController;
//use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\praticiensController;
use App\Http\Controllers\rendezvous\ProgrammerRdvController;
use App\Models\Services;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\RendezvoussController;
use App\Http\Controllers\HoraireController;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|*/
use App\Http\Controllers\ViewController;
use App\Http\Controllers\AudioController;

use App\Http\Controllers\ConversationController;
use App\Http\Controllers\AudioMessageController;
use App\Http\Controllers\PaiementController;
use App\Http\Controllers\ExamenController;




Route::post('/examens', [ExamenController::class, 'storeexamen'])->name('examens.storeexamen');
Route::get('/paiements/formpaye', [PaiementController::class, 'formpaye'])->name('paiements.formpaye');
Route::post('/paiements', [PaiementController::class, 'paye'])->name('paiements.paye');
/*Route::middleware('auth')->group(function () {
    Route::get('/conversations', [ConversationController::class, 'index']);
    Route::get('/conversations/{conversation}', [ConversationController::class, 'show']);
    Route::post('/conversations/{conversation}/audio', [AudioMessageController::class, 'store']);
});*/Route::middleware('auth')->group(function () {
    /*Route::get('/conversations', [ConversationController::class, 'index'])->name('conversations.index');
    Route::get('/conversations/{conversation}', [ConversationController::class, 'show'])->name('conversations.show');
    Route::post('/conversations', [ConversationController::class, 'create'])->name('conversations.create');
    Route::post('/conversations/{conversation}/audio', [AudioMessageController::class, 'store'])->name('audio.store');*/
    //Route::get('/examimprime', [ExamenController::class, 'examimprime'])->name('examimprime');
    Route::get('/examimprime', [ExamenController::class, 'examimprime'])->name('examimprime');
    Route::get('/examens/prescrireexam/{patientId}', [ExamenController::class, 'createexamen'])->name('prescrireExamen');
    Route::get('/examens/{id}', [ExamenController::class, 'showexm'])->name('examens.showexm');
    Route::get('/examens/{id}/print', [ExamenController::class, 'printexm'])->name('examens.printexm');
    Route::get('/conversations/{id}', [ConversationController::class, 'show'])->name('conversations.show');
    Route::post('/conversations/{id}/audio', [AudioMessageController::class, 'store'])->name('audio.store');
    Route::get('/conversations', [ConversationController::class, 'index'])->name('conversations.index');
    Route::get('/conversations/{id}', [ConversationController::class, 'show'])->name('conversations.show');
    Route::post('/conversations/{id}/audio', [AudioMessageController::class, 'store'])->name('audio.store');
});

Route::get('/record-audio', [AudioController::class, 'showRecordAudioForm']);
Route::post('/upload-audio', [AudioController::class, 'upload']);
Route::middleware(['auth'])->group(function () {
    //Route::get('/frenteprati/horaires', [HoraireController::class, 'horaire'])->name('horaires.horaire');
    Route::get('/frenteprati/horaires', [HoraireController::class, 'index'])->name('horaires.index');
    Route::get('/praticien/horaires/create', [HoraireController::class, 'create'])->name('horaires.create');
    Route::post('/praticien/horaires', [HoraireController::class, 'store'])->name('horaires.store');
    Route::delete('/praticien/horaires/{id}', [HoraireController::class, 'destroy'])->name('horaires.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/patient', [ViewController::class, 'showPatientView'])->name('patient.view');
    Route::post('/rendezvous/request/{praticien}', [RendezvoussController::class, 'requestAppointment'])->name('rendezvous.request');
});

Route::middleware(['auth', 'roles:user'])->group(function () {
    //Route::get('/patient/{praticien_id}/horaires', [RendezvoussController::class, 'availableHoraires'])->name('patient.horaires');
    //Route::get('/patient/horaires', [RendezvoussController::class, 'availableHoraires'])->name('patient.horaires');
    //Route::get('/rendezvous/request/{horaireId}', [RendezvoussController::class, 'requestAppointment'])->name('rendezvous.request');
    Route::get('/patient/{praticien_id}/horaires', [RendezvoussController::class, 'availableHoraires'])->name('patient.horaires');
    Route::post('/patient/horaires/{horaireId}/request', [RendezvoussController::class, 'requestAppointment'])->name('patient.requestAppointment');
});

// Route pour confirmer le rendez-vous par le praticien
Route::middleware(['auth', 'roles:praticien'])->group(function () {
    Route::post('/rendezvous/confirm/{id}', [RendezvoussController::class, 'confirmAppointment'])->name('rendezvous.confirm');
});

// Routes pour les praticiens
Route::middleware('auth')->group(function () {
    Route::get('/praticien', [ViewController::class, 'showPraticienView'])->name('praticien.view');
    Route::get('/rdvconfirme', [ViewController::class, 'confirmes'])->name('rdvconfirme.view');
    Route::post('/rendezvous/confirm/{id}', [RendezvoussController::class, 'confirmAppointment'])->name('rendezvous.confirm');
    Route::get('/listepatient', [ViewController::class, 'showPraticienPatient'])->name('listepatient.view');
});
Route::get('patient/dashboard', function(){
    return view('patient.frontad.dashboard');
});
Route::get('/notification-form', function () {
    return view('notification_form');
})->name('notification.form');

// Route pour envoyer la notification
Route::post('/send-notification', [NotificationController::class, 'sendNotification'])->name('notification.send');

Route::get('/user/invoice/{invoice}', function (Request $request, string $invoiceId) {
    return $request->user()->downloadInvoice($invoiceId);
});

Route::middleware(['auth', 'roles:admin'])->group(function () {
    Route::get('/admin/users', [AdminController::class, 'listUsers'])->name('admin.users');
    Route::post('/admin/users/assign-role', [AdminController::class, 'assignRole'])->name('admin.users.assignRole');

});

Route::get("/showpatient/{id}/edit", [ProgrammerRdvController::class, 'editPatient']);
//Route::get('/update-service/{id}', [AdminController::class, 'UpdateService'])->name('update-service');


Route::get('/', [FrontendController::class, 'index']);
Route::get('/contact', [FrontendController::class, 'contact']);
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('frontad');
//Route::get('/praticien',[AdminController::class, 'dashboardprati']);
Route::get('/servicead',[AdminController::class, 'servicead']);
Route::middleware('auth')->group(function () {
    Route::get('/frontad',[AdminController::class, 'index2']);
    Route::get('/users',[AdminController::class, 'users']);
    Route::get('/userprofil',[AdminController::class, 'usersp']);
    Route::get('/patientad',[AdminController::class, 'patientad']);
    Route::get('/user',[AdminController::class, 'user']);
    Route::get('/partenaireassurance',[AdminController::class, 'partenaireassurance']);
    Route::get('/patientl',[AdminController::class, 'patientl']);
    Route::get('/update-services/{id}',[AdminController::class, 'update_services']);
    Route::post('/update/traitement',[AdminController::class, 'update_services_traitement']);
    Route::get('/updateAssurance-assurances/{id}',[AdminController::class, 'updateAssurance_assurances']);
    Route::post('/updateAssurance/traitement',[AdminController::class, 'updateAssurance_assurances_traitement']);

});


Route::get('/users',[AdminController::class, 'users']);
    Route::get('/userprofil',[AdminController::class, 'usersp']);
    Route::get('/patientad',[AdminController::class, 'patientad']);
    Route::get('/partenaireassurance',[AdminController::class, 'partenaireassurance']);
    Route::get('/patientl',[AdminController::class, 'patientl']);
    //Route::get('/update-services/{id}',[AdminController::class, 'update_services']);
    //Route::post('/update/traitement',[AdminController::class, 'update_services_traitement']);

    Route::middleware(['auth'])->group(function () {
    Route::get('/praticien/frenteprati/create', [OrdonnanceController::class, 'create'])->name('ordonnances.create');
     Route::get('ordonnances/{id}', [OrdonnanceController::class, 'show'])->name('ordonnances.show');
    Route::post('ordonnances', [OrdonnanceController::class, 'store'])->name('ordonnances.store');
});

Route::middleware(['auth', 'roles:praticien'])->group(function () {
    Route::get('/praticien/frenteprati',[AdminController::class, 'inde2']);
    Route::get('/tableTime',[AdminController::class, 'empt']);
    Route::get('/createTT', [AdminController::class, 'createTT'])->name('emplt.create');
    Route::post('/admin/store3', [AdminController::class, 'store3'])->name('emplt.store3');


   /* Route::get('/praticien/frenteprati/create', [OrdonnanceController::class, 'create'])->name('ordonnances.create');
    Route::get('ordonnances/{id}', [OrdonnanceController::class, 'show'])->name('ordonnances.show');
    Route::post('ordonnances', [OrdonnanceController::class, 'store'])->name('ordonnances.store');*/

    Route::get('/liste-patients', [AdminController::class, 'listePatients'])->name('liste.patients');

});
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
//***************************** CRUD DASHBOARD ADMIN
Route::middleware('auth')->group(function () {
    Route::get('/charts', [ChartController::class, 'index']);
    Route::get('/ajouter',[AdminController::class, 'ajouter_service']);
    Route::post('/ajouter/traitement',[AdminController::class, 'ajouter_service_traitement']);
    Route::post('/updateService/traitement',[AdminController::class, 'updateService_service_traitement']);
    Route::get('/delete-service/{id}',[AdminController::class, 'delete_service']);
    Route::get('/ajouterAssurance',[AdminController::class, 'ajouterAssurance_assuranse']);
    Route::post('/ajouterAssurance/traitement',[AdminController::class, 'ajouterAssurance_assurance_traitement']);
    Route::get('/delete-assurance/{id}',[AdminController::class, 'delete_assurance']);
    Route::get('/create', [AdminController::class, 'create'])->name('praticiens.create');
    Route::post('/admin/store', [AdminController::class, 'store'])->name('praticiens.store');
    Route::post('/store',[AdminController::class, 'store']);
    Route::get('/ajouterPatient', [AdminController::class, 'ajouterPatient'])->name('patients.create');
    Route::post('/admin/store2', [AdminController::class, 'store2'])->name('patients.store2');
    //Route::get('/store', [AdminController::class, 'store'])->name('praticiens.create');
    //Route::post('/admin/store', [AdminController::class, 'store'])->name('patients.store');
    Route::get('/create', [AdminController::class, 'create'])->name('praticiens.create');
    Route::post('/admin/storePraticien', [AdminController::class, 'storePraticien'])->name('praticiens.storePraticien');
    //Route::get('/ajouterPraticien', [AdminController::class, 'ajouterPraticien']);
    //Route::post('/ajouterPraticien/traitement', [AdminController::class, 'ajouterPraticien_traitement']);
    // Route pour modifier un praticien
    Route::get('/praticiens/{praticien}/edit', [AdminController::class, 'edit1'])->name('praticiens.edit');
    Route::put('/praticiens/{praticien}', [AdminController::class, 'update1'])->name('praticiens.update1');

// Route pour supprimer un praticien
    Route::delete('/praticiens/{praticien}', [AdminController::class, 'destroy'])->name('praticiens.destroy');
    });
   /* Route::middleware(['auth', 'roles:admin'])->group(function () {
        Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
        Route::get('/updateUser-user/{id}',[AdminController::class, 'updateUser_user']);
        Route::put('/updateUser/traitement/{id}',[AdminController::class, 'updateUser_user_traitement'])->name('update.user');
});*/
require __DIR__.'/auth.php';

/*::get('/admin/users', [AdminController::class, 'showUsers'])->name('admin.users');
Route::post('/admin/users/{userId}/assign-role', [AdminController::class, 'assignRole'])->name('admin.assignRole');*/
Route::get('/admin/services', [AdminController::class, 'listService'])->name('admin.services.index');
Route::get('/admin/services/{id}/praticiens', [AdminController::class, 'showPraticiens'])->name('admin.services.praticiens');
Route::get('/listeserviceP',[AdminController::class, 'listeserviceP'])->name('admin.listeserviceP');
/*Route::middleware(['auth', 'roles:admin'])->group(function () {
    Route::get('/listeserviceP',[AdminController::class, 'listeserviceP'])->name('admin.listeserviceP');
});*/

Route::middleware(['auth', 'roles:admin'])->group(function () {
    Route::get('/index',[AdminController::class, 'praticiens'])->name('admin.index');
});
Route::get('/listepraticiensP', [serviceController::class, 'praticiens'])->name('listespraticiensP');
Route::middleware(['auth', 'roles:admin'])->group(function () {
    Route::get('/listespraticiensP',[AdminController::class, 'praticiens'])->name('admin.listespraticiensP');

});
Route::middleware(['auth', 'roles:admin'])->group(function () {
    Route::get('/update-praticien/{id}',[AdminController::class, 'update_praticien']);
    Route::post('/update/traitement',[AdminController::class, 'update_praticien_traitement']);
});

Route::middleware(['auth', 'roles:admin'])->group(function () {
    Route::get('/update-service/{id}',[AdminController::class, 'service']);
    Route::post('/update/traitement',[AdminController::class, 'update_services_traitement']);
});

/*Route::middleware(['auth', 'roles:admin'])->group(function () {
    Route::get('/admin/users', [AdminController::class, 'showUsers'])->name('admin.showUsers');
    Route::post('/admin/users', [AdminController::class, 'updateRoles'])->name('admin.updateRoles');
});*/
Route::middleware(['auth', 'roles:admin'])->group(function () {
    Route::get('/frontad',[AdminController::class, 'index2']);
    Route::get('/userprofil',[AdminController::class, 'userprofil']);
    Route::get('/admin/dashboard/listeserviceP',[AdminController::class, 'listeserviceP'])->name('admin.listeserviceP');
    Route::get('/admin/dashboard/listepraticiensP',[AdminController::class, 'listepraticiensP'])->name('admin.listepraticiensP');
    Route::get('/admin/dashboard', [AdminController::class, 'users'])->name('admin.users');
});

// Route DD

Route::prefix('patient')->group(function () {

    Route::get("/registrepatient", [ProgrammerRdvController::class, 'recupRegistrePatient'])->name('vue.registre.patient');
    Route::post("/registrepatient", [ProgrammerRdvController::class, 'StorePatient'])->name('registre.patient');
    Route::get("/gg", function () {
        echo "Hello";
    });
});

Route::get("/rdv", [ProgrammerRdvController::class, 'ProgrammeRdv'])->name('patient.rdvProgramme');
Route::get("/aa", [ProgrammerRdvController::class, 'AA'])->name('patient.rdv');
// Route::get('praticien/empoi_du_temps/{praticienId}',[ProgrammerRdvController::class,'afficherRdv'])->name('afficher.rdv');

// Message success

Route::get('/succes',function(){
    return view('pdf.personne.confirmation');
})->name('message.success');

// Gestion des images

Route::get('upload', function () {
    return view('pdf.image.upload');
});

Route::post('upload', [ImageController::class, 'upload'])->name('image.upload');

require __DIR__.'/notifications/notificationWeb.php';