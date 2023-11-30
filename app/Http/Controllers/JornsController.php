<?php

namespace App\Http\Controllers;

use App\Models\Prof;
use App\Models\Classe;
use App\Models\Semestre;
use Illuminate\Http\Request;

class JornsController extends Controller
{
    public function show($locale, $ids)
    {
        
        $class = Classe::find($ids);
    

        if ($class) {
            return view('Jorn',['clas'=> $ids]);
        } else {
           abort(404);
        }
        

    }

 

    public function showc()
    {
        $Classs = Classe::select('id', 'nom')->get();

        if ($Classs) {
            return view('Jorns',['Classs' => $Classs]);
        } else {
           abort(404);
        }


       // return view('Jorns',['Classs' => $Classs]);

    }

    public function list($locale,$id)
    {
        if (auth()->user()->parent_id){
            abort(403);
        }

        $classe = Classe::find($id);
        if ($classe) {
            $list = $classe->etuds;

            return view('ClassList',['lists' => $list,'classe' => $classe]);
        } else {
           abort(404);
        }
        
       ;
    }

    public function result($locale,$id, $sem)
    {
        if (auth()->user()->parent_id){
            abort(403);
        }

        $sem = Semestre::find($sem);
        $classe = Classe::find($id);

        if ($classe and  $sem) {

            $list = $classe->etuds;
            return view('ClasseBulttins',
            ['lists' => $list,
                    'classe' => $classe,
                    'sem' => $sem->id,
                    ]);
        } else {
           abort(404);
        }

    }

    public function showp($locale,$ids)
    {
        if (auth()->user()->parent_id){
            abort(403);
        }

        $id = Prof::find($ids);
        if ($id) {
            return view('Jornp',['clas'=> $ids]);
        } else {
           abort(404);
        }

    }


    public function class($locale, $ids)
    {
        if (auth()->user()->parent_id){
            abort(403);
        }

        $id = Prof::find($ids);
        if ($id and  ($id->ts == 2 or $id->ts == 3)) {
            return view('ClassesProfs',['prof'=> $id]);
        } else {
           abort(404);
        }
    }

    public function attds()
    {
        if (auth()->user()->parent_id){
            abort(403);
        }
        return view('Attds',);
    }


    public function soir($locale, $ids)
    {
        
        $class = Classe::find($ids);
    

        if ($class) {
            return view('JornSoir',['clas'=> $ids]);
        } else {
           abort(404);
        }
        

    }
    
    public function Horaires($locale, $ids)
    {
        $Classs = Classe::find($ids);

        if ($Classs) {
            return view('ClasseHoraires',['Classs' => $Classs]);
        } else {
           abort(404);
        }
    }

}
