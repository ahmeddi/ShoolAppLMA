<?php

namespace App\Http\Controllers;

use App\Models\Dette;
use App\Models\Entreprise;
use Illuminate\Http\Request;

class EntrepriseController extends Controller
{
    function show($locale, $ent)
    {
        if (!(auth()->user()->role == 'comps' or auth()->user()->role == 'admin'))
        {
            abort(403);
        }



        if (Entreprise::find($ent)) {
            $entreprise = Entreprise::find($ent);
            return view('Entreprise',['entreprise' => $entreprise]);
        } else {
            abort(404);
        }
    }

    function dette($locale,$did)
    {
        if (!(auth()->user()->role == 'comps' or auth()->user()->role == 'admin'))
        {
            abort(403);
        }


        
        $dettes = Dette::find($did);

        if ($dettes)
        {
            return view('Dette',['dette' => $dettes->id]);

        } else {
            abort(404);
        }
    }

}
