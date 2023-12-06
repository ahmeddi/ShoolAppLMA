<?php

namespace App\Http\Controllers;

use App\Models\Emp;
use App\Models\Prof;
use Illuminate\Http\Request;

class ProfController extends Controller
{
    public function show($locale,$ids)
    {
        if (auth()->user()->role == 'prof'){
            abort(403);
        }

        if (auth()->user()->role == 'parent'){
            abort(403);
        }

       $idss =  Prof::find($ids);

       if ($idss) {
        return view('Prof',['prof'=> $idss]);
       } else {
              abort(404);
       }
       
        
        
    }

    public function emp($locale, $ids)
    {
         if (auth()->user()->role == 'parent' or auth()->user()->role == 'prof'){
            abort(403);
        }


        if (Emp::find($ids)) {
            $idss =  Emp::find($ids);
        
            return view('Emp',['emp'=> $idss]);
        }
        else {
            abort(404);
        }

    }

    public function att($locale,$ids)
    {
         if (auth()->user()->role == 'parent' or auth()->user()->role == 'prof'){
            abort(403);
        }


       $idss =  Prof::find($ids);

       if ($idss) 
       {

        $hours = $idss->hours;
        return view('ProfAtt',['prof'=> $idss,'hours'=> $hours]);
        }
        else {
            abort(404);
        }

      
    }

    public function attemp($locale, $ids)
    {
         if (auth()->user()->role == 'parent' or auth()->user()->role == 'prof'){
            abort(403);
        }


        if (Emp::find($ids)) {
            $idss = Emp::find($ids);
            $hours = $idss->hours;

            $hours = $idss->hours;
        
            return view('EmpAtt',['prof'=> $idss,'hours'=> $hours]);
        }
        else {
            abort(404);
        }

    }


    public function compt($locale, $ids)
    {
         if (auth()->user()->role == 'parent' or auth()->user()->role == 'prof'){
            abort(403);
        }

        $idss =  Prof::find($ids);

        if ($idss) 
        {
         return view('ProfCompt',['prof'=> $idss,]);
         }
         else {
             abort(404);
         }
    
    }

    public function honhoraire($locale, $ids)
    {
        if (auth()->user()->role == 'parent' || auth()->user()->role == 'dir' || auth()->user()->role == 'sur' || auth()->user()->role == 'prof'){
            abort(403);
        }
        $idss =  Prof::find($ids);

        if ($idss) 
        {
         return view('ProfHonhoraire',['prof'=> $idss,]);
         }
         else {
             abort(404);
         }

    }

    public function paiements($locale, $ids)
    {
        if (auth()->user()->role == 'parent' || auth()->user()->role == 'dir' || auth()->user()->role == 'sur' || auth()->user()->role == 'prof'){
            abort(403);
        } 

        $idss =  Prof::find($ids);

        if ($idss) 
        {
         return view('ProfPaiements',['prof'=> $idss,]);
         }
         else {
             abort(404);
         }

    }

    public function remises($locale, $ids)
    {
        if (auth()->user()->role == 'parent' || auth()->user()->role == 'dir' || auth()->user()->role == 'sur' || auth()->user()->role == 'prof'){
            abort(403);
        }
        
        $idss =  Prof::find($ids);

        if ($idss) 
        {
         return view('ProfRemises',['prof'=> $idss,]);
         }
         else {
             abort(404);
         }

    }
    
    public function classeMats($locale, $ids)
    {
        if (auth()->user()->role == 'parent' || auth()->user()->role == 'dir' || auth()->user()->role == 'sur' || auth()->user()->role == 'prof'){
            abort(403);
        }
        
        $idss =  Prof::find($ids);

        if ($idss) 
        {
         return view('ProfClasseMats',['ids'=> $idss,]);
         }
         else {
             abort(404);
         }

    }

}
