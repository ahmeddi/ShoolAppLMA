<?php

use App\Models\Classe;
use App\Models\Depance;
use App\Models\Parentt;
use App\Models\Etudiant;
use App\Models\AttdsClass;
use App\Models\DepanceEnt;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\EmpController;
use App\Http\Controllers\ProfController;
use App\Http\Controllers\JornsController;
use App\Http\Controllers\ParentController;
use App\Http\Controllers\ResultController;
use App\Http\Controllers\EtudiantController;
use App\Http\Controllers\EntrepriseController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::middleware([
    'auth:sanctum',
    'bannedcheck',])
    ->get('/', function () {
    if (auth()->check()) {
        if (auth()->user()->role == 'parent') {
            return redirect('ar/Parent/' . auth()->user()->parent_id);
        }
        return redirect('ar/dashboard');
    }
});


Route::middleware([
    'auth:sanctum',
    'bannedcheck',
    config('jetstream.auth_session'),
    'verified',
])->prefix('{locale}')
    ->where(['locale' => '[a-zA-Z]{2}'])
    ->group(function () {

    
    Route::get('/dashboard', function () {

        if (auth()->user()->role == 'parent') {

            return redirect('ar/Parent/'.auth()->user()->parent_id);
        }

        return view('dashboard');
    })->name('dashboard')
   //   ->middleware('can:admin');
        
      ;

    // Route::get('/Add', function () {
    //     return view('Add');
    // })->name('Add');


    #Etudiants --------------------------------------------------------

    Route::get('/Etudiants', function () {
        if (auth()->user()->parent_id){
            abort(403);
        }
        
        return view('Etudiants');
    })
    ->name('Etudiants');

    Route::get('/Etudiant/{etud}', [EtudiantController::class,"show"])
    ->name('Etudiant');

    Route::get('/Etudiant/{etud}/Att', [EtudiantController::class,"attetud"])
    ->name('EtudAtt');

    Route::get('/Etudiant/{etud}/Notes', [EtudiantController::class,"note"])
    ->name('Note');

    Route::get('/Etudiant/{id}/Compt', [EtudiantController::class,"etudiantEco"])
    ->name('etudiantEco');

    Route::get('/Etudiant/{id}/Frais', [EtudiantController::class,"frais"])
    ->name('EtudiantFrais');



     #Classes --------------------------------------------------------

    Route::get('/Classes', function () {
        if (auth()->user()->parent_id){
            abort(403);
        }
        return view('Classes');
    })->name('Classes');

    Route::get('/Classe/{data}', function ($locale,$data) {
        if (auth()->user()->parent_id){
            abort(403);
        }
        if (Classe::find($data)) {
            $data = Classe::find($data);
            return view('Classe',['Classe' => $data,]);
        } else {
            abort(404);
        }
    })->name('Class');

    Route::get('/Classe/List/{id}', [JornsController::class,"list"])
    ->name('Classlist');

    Route::get('/Classe/{data}/Mats', function ($locale,$data) {
        if (auth()->user()->parent_id){
            abort(403);
        }
        if (Classe::find($data)) {
            $data = Classe::find($data);
            return view('ClasseMats',['Classe' => $data,]);
        } else {
            abort(404);
        }
        
    })->name('ClassMats');

    Route::get('/Classe/Results/{id}/Sem/{sem}', [JornsController::class,"result"]);
    
    Route::get('/Classe/{id}/Horaires', [JornsController::class,"Horaires"]);



    #Matieres --------------------------------------------------------

    Route::get('/Mats', function () {
        if (auth()->user()->parent_id){
            abort(403);
        }
        return view('Mats');
    })->name('Mats');


    #Profs --------------------------------------------------------

    Route::get('/Profs', function () {
        if (auth()->user()->parent_id){
            abort(403);
        }
        return view('Profs');
    })->name('Profs');


    Route::get('/Prof/{prof}', [ProfController::class,"show"])
    ->name('Prof');

    Route::get('/Profs/{Profs}', [JornsController::class,"showp"]);

    Route::get('/Prof/{Profs}/Classes', [JornsController::class,"class"]);

    
    Route::get('/Profs/{Profs}', [JornsController::class,"showp"]);

    Route::get('/Prof/{Profs}/Classes', [JornsController::class,"class"]);

    Route::get('/Atdds/Profs/', function () {
        if (auth()->user()->parent_id){
            abort(403);
        }
        return view('Attdsp',);})
  ->name('Atddsp');

  Route::get('/Prof/{prof}/Att', [ProfController::class,"att"])
  ->name('ProfAtt');

  Route::get('/Prof/{prof}/Compt', [ProfController::class,"compt"])
  ->name('ProfCompt');

  Route::get('/Prof/{prof}/Compt/Honhoraire', [ProfController::class,"honhoraire"])
  ->name('ProfHonhoraire');

  Route::get('/Prof/{id}/Compt/Paiements', [ProfController::class,"paiements"])
  ->name('ProfPaiements');

  Route::get('/Prof/{id}/Compt/Remises', [ProfController::class,"remises"])
  ->name('ProfRemises');



    #Attds --------------------------------------------------------

    Route::get('/Atnddse', [JornsController::class,"attds"])
    ->name('Atddse');

    Route::get('/Atdds/Etuds', function () {
        if (auth()->user()->parent_id){
            abort(403);
        }
      //  dd('ok');
        return view('Attdse',);})
     ->name('Atddsee');


     Route::get('/Attds/Classe', function () {
        if (auth()->user()->parent_id){
            abort(403);
        }
        return view('ClasseAttds',);})
     ->name('ClasseAttds');

     Route::get('/Attds/Classe/{id}', function ($locale,$id) {
        if (auth()->user()->parent_id){
            abort(403);
        }

        $att = AttdsClass::find($id);

        if ($att) {
            return view('ClasseAttd',['ids' => $att->id,'nom' => $att->classe->nom]);
        } else {
            abort(404);
        }
        })
     ->name('ClasseAttd');



    #Jorns --------------------------------------------------------

    Route::get('/Jorns', [JornsController::class,"showc"])
    ->name('Jorns');

    Route::get('/Jorn/{Jorn}', [JornsController::class,"show"])
    ->name('Jorn');

    Route::get('/Jorn/{Jorn}/Soir', [JornsController::class,"soir"])
    ->name('JornSoir');





    #Resultats --------------------------------------------------------

    Route::get('/Result', function () {
        if (auth()->user()->parent_id){
            abort(403);
        }
        return view('Result');
    })->name('Result');

    Route::get('/Resultat/Class/{class}/Mats/{mat}/Dev/{dev}', [ResultController::class,"show"]) 
    ->name('Resultat');

    Route::get('/Resultat/Etudiant/{etud}/Sem/{sem}', [ResultController::class,"bulltin"]) 
    ->name('Bulltin');


    Route::get('/Result/{etud}/Notes', [ResultController::class,"notes"]) 
    ->name('ResultatEtud');





    #Emps --------------------------------------------------------

    Route::get('/Emps', function () {
        if (auth()->user()->parent_id){
            abort(403);
        }
        return view('Emps');
    })->name('Emps');

    Route::get('/Emp/{emp}', [ProfController::class,"emp"])
    ->name('Emp');

    Route::get('/Atdds/Emps/', function () {
        if (auth()->user()->parent_id){
            abort(403);
        }
        return view('Attdsep',);})
        ->name('Atddsep');

    Route::get('/Emp/{emp}/Att', [ProfController::class,"attemp"])
    ->name('EmpAtt');

    Route::get('/Emp/{id}/Compt', [EmpController::class,"compt"])
    ->name('EmpCompt');
  
    Route::get('/Emp/{id}/Compt/Honhoraire', [EmpController::class,"honhoraire"])
    ->name('EmpfHonhoraire');
  
    Route::get('/Emp/{id}/Compt/Paiements', [EmpController::class,"paiements"])
    ->name('EmpPaiements');
  
    Route::get('/Emp/{id}/Compt/Remises', [EmpController::class,"remises"])
    ->name('EmpRemises');



    #Notes --------------------------------------------------------

    Route::get('/Notes', function () {
        if (auth()->user()->parent_id){
            abort(403);
        }
        return view('Notes');
    })->name('Notes');



    #Comps --------------------------------------------------------

    Route::get('/Comps', function () {
        if (!(auth()->user()->role == 'comps' or auth()->user()->role == 'admin'))
        {
            abort(403);
        }
        return view('Comps');
    })->name('Comps');



    #Parametres --------------------------------------------------------

    Route::get('/Parametres', function () {
        if (auth()->user()->role == 'admin')
        {
            return view('Parametres');
        }
        else{
           
            abort(403);
        }
    })->name('Parametres');



    #Parents --------------------------------------------------------

    Route::get('/Parents', function () {
        if (auth()->user()->parent_id){
            abort(403);
        }
        return view('Parents');
    })->name('Parents');


    Route::get('/Parent/{id}', [ParentController::class,"show"])
  //  ->middleware('can:parent')
    ->name('Parent');

    Route::get('/Parent/{id}/Frais', [ParentController::class,"frais"])
    ->name('ParentFrais');

    Route::get('/Parent/{id}/Paiements', [ParentController::class,"paiements"])
    ->name('ParentPaiements');

    Route::get('/Parent/{id}/Remises', [ParentController::class,"remises"])
    ->name('ParentRemises');



    #Entreprises --------------------------------------------------------

    Route::get('/Entreprises', function () {
        if (!(auth()->user()->role == 'comps' or auth()->user()->role == 'admin'))
        {
            abort(403);
        }

        return view('Entreprises');
    })->name('Entreprises');

    Route::get('/Entreprise/{ent}', [EntrepriseController::class,"show"])
    ->name('Entreprise');

    Route::get('/Dette/{det}', [EntrepriseController::class,"dette"])
    ->name('Dette');



    #Depenses --------------------------------------------------------

    Route::get('/Depenses', function () {
        if (!(auth()->user()->role == 'comps' or auth()->user()->role == 'admin'))
        {
            abort(403);
        }

        return view('Depenses');
    })->name('Depenses');

    Route::get('/Depenses/List', function () {
        if (!(auth()->user()->role == 'comps' or auth()->user()->role == 'admin'))
        {
            abort(403);
        }

        return view('DepensesList');
    })->name('DepensesList');


    Route::get('/Depense/{id}', function ($locale, $id) {

        if (!(auth()->user()->role == 'comps' or auth()->user()->role == 'admin'))
        {
            abort(403);
        }

           $dep = DepanceEnt::find($id);

        if ($dep) {
            return view('Depense',['ids' => $dep->id,'nom' => $dep->nom]);
        } else {
            abort(404);
        }
       
    })->name('Depense');




    #Dette --------------------------------------------------------


    Route::get('/Dettes', function () {

        if (auth()->user()->role == 'comps' or auth()->user()->role == 'admin')
        {
            return view('Dettes');
        }
        else{
            abort(403);
        }
    })->name('Dettes');


    Route::get('/Dettes/Parents', function () {
        if (auth()->user()->parent_id){
            abort(403);
        }
        return view('DettesParents');
    })->name('DettesParents');

    Route::get('/Dettes/Prets', function () {
        if (auth()->user()->role == 'comps' or auth()->user()->role == 'admin')
        {
            return view('DettesPres');
        }
        else{
            abort(403);
        }
    })->name('DettesPres');

    Route::get('/Salaires', function () {
        if (auth()->user()->role == 'comps' or auth()->user()->role == 'admin')
        {
            return view('Salaires');
        }
        else{
            abort(403);
        }
        
    })->name('Salaires');


    #Utilisateurs --------------------------------------------------------

    Route::get('/Utilisateurs', function () {
        if (auth()->user()->role != 'admin'){
            abort(403);
        }
        return view('Utilisateurs');
    })->name('Utilisateurs');


    Route::get('/Set', function () {
        if (auth()->user()->role != 'admin'){
            abort(403);
        }
        return view('Set');
    })->name('Set');


    #Whatsapp --------------------------------------------------------

    Route::get('/Whatsapp', function () {
        if (auth()->user()->role != 'admin'){
            abort(403);
        }
        return view('Whatsapp');
    })->name('Whatsapp');









    

    
});
