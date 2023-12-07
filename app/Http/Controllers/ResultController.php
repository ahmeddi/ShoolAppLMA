<?php

namespace App\Http\Controllers;

use App\Models\Mat;
use App\Models\Classe;
use App\Models\Etudiant;
use App\Models\Examen;
use App\Models\Prof;
use App\Models\Semestre;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function show($locale,$classe, $mat, $dev)
    {
        
        if (auth()->user()->parent_id){
            
            abort(403);
        }

        $prof = Prof::find(auth()->user()->prof_id);

        if ($prof) {

         //   dd($prof->mats);

            if(!($prof->mats->whereIn('id', [$mat])->count())){

                return abort(403);
            }
            if(!($prof->classes->whereIn('id', [$classe])->count())){

                return abort(403);
            }
        
        }
        

         $classe = Classe::with('etuds')->get()->find($classe);
 
         if($classe->mats->whereIn('id', [$mat])->count()){
             $mat    = Mat::find($mat);
             $dev    = Examen::find($dev);


             if (app()->getLocale() == 'ar') {
                    $sem_nom = $dev->sem->nom;
                    $dev_nom = $dev->nom;
             }
             else{
                    $sem_nom = $dev->sem->nomfr;
                    $dev_nom = $dev->nomfr;
             }
 
             return view('Resultat',[
                 'classe' => $classe,
                 'mat' => $mat,
                 'dev' => $dev,
                 'mat_nom' => $mat->nom,
                 'sem_nom' => $sem_nom,
                 'dev_nom' => $dev_nom,
             ]);
 
         }
         else
         {
             return abort(404);
         }
 
    }
 
    public function bulltin($locale, $etud, $sem)
    {
        if (auth()->user()->parent_id or auth()->user()->role == 'prof'){
            abort(403);
        }

         if (Semestre::find($sem)) {
             return view('Bulltin',[
                 'etud' => $etud,
                 'sem' => $sem,
             ]);
         }
         else
         {
             return abort(404);
         }
            
    }
 
    public function result($etud)
    {
        if (auth()->user()->parent_id or auth()->user()->role == 'prof'){
            abort(403);
        }
        
         $sems = Semestre::all();
 
 
         return view('EtudsSemestres',[
             'sems' => $sems,
             'etud' => $etud,
         ]);
    }

    public function notes($locale,$etud)
    {

        $etudiant = Etudiant::find($etud);

        $etudiant ? $etudiant : abort(404);

        if (auth()->user()->parent_id) {
            if (!(auth()->user()->parent_id == $etudiant->parent_id)){
                abort(403);
            }
        }

      //  $results = $etudiant->results;

      //  dd($results);
         
 
         return view('ResultEtud',[
            // 'results' => $results,
             'etudiant' => $etudiant,
         ]);
    }
 
 
}
