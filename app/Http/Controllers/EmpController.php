<?php

namespace App\Http\Controllers;

use App\Models\Emp;
use Illuminate\Http\Request;

class EmpController extends Controller
{
    
    public function compt($locale, $ids)
    {   
         if (auth()->user()->role == 'parent'){
            abort(403);
        }


        $idss =  Emp::find($ids);

        if ($idss) 
        {
         return view('EmpCompt',['emp'=> $idss,]);
         }
         else {
             abort(404);
         }
    
    }

    public function honhoraire($locale, $ids)
    {
         if (auth()->user()->role == 'parent'){
            abort(403);
        }


        $idss =  Emp::find($ids);

        if ($idss) 
        {
         return view('EmpHonhoraire',['emp'=> $idss,]);
         }
         else {
             abort(404);
         }

    }

    public function paiements($locale, $ids)
    {
         if (auth()->user()->role == 'parent'){
            abort(403);
        }


        $idss =  Emp::find($ids);

        if ($idss) 
        {
         return view('EmpPaiements',['emp'=> $idss,]);
         }
         else {
             abort(404);
         }

    }

    public function remises($locale, $ids)
    {
         if (auth()->user()->role == 'parent'){
            abort(403);
        }

        
        $idss =  Emp::find($ids);

        if ($idss) 
        {
         return view('EmpRemises',['emp'=> $idss,]);
         }
         else {
             abort(404);
         }

    }


}
