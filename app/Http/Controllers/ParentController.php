<?php

namespace App\Http\Controllers;

use App\Models\Parentt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ParentController extends Controller
{
    function show($locale,$data)
    {

         $parentt = Parentt::find($data);

        if ($parentt) { 
            if(auth()->user()->role == 'parent'){
                if (Gate::allows('view', $parentt)) {
                    return view('Parent', ['Parent' => $parentt]);
                } else {
                    abort(403);
                }
            }
            return view('Parent', ['Parent' => $parentt]);
            
        } else {
            abort(404);
        }
        
    }

    public function frais($locale,$data)
    {
        $parentt = Parentt::find($data);


        if ($parentt) { 
            if(auth()->user()->role == 'parent'){
                if (Gate::allows('view', $parentt)) {
                    return view('ParentFrais',['data' => $parentt,]);
                } else {
                    abort(403);
                }
            }

            if (auth()->user()->role == 'dir' || auth()->user()->role == 'sur') {
                abort(403);
            }
            return view('ParentFrais',['data' => $parentt,]);
            
        } else {
            abort(404);
        }

    }

    public function paiements($locale,$data)
    {
        $parentt = Parentt::find($data);


        if ($parentt) { 
            if(auth()->user()->role == 'parent'){
                if (Gate::allows('view', $parentt)) {
                    return view('ParentPaiements',['data' => $parentt,]);
                } else {
                    abort(403);
                }
            }
            if (auth()->user()->role == 'dir' || auth()->user()->role == 'sur') {
                abort(403);
            }
            return view('ParentPaiements',['data' => $parentt,]);
            
        } else {
            abort(404);
        }
    }

    public function remises($locale,$data)
    {
        $parentt = Parentt::find($data);

        if ($parentt) { 
            if(auth()->user()->role == 'parent'){
                if (Gate::allows('view', $parentt)) {
                    return view('ParentRemises',['data' => $parentt,]);
                } else {
                    abort(403);
                }
            }
            if (auth()->user()->role == 'dir' || auth()->user()->role == 'sur') {
                abort(403);
            }
            return view('ParentRemises',['data' => $parentt,]);
            
        } else {
            abort(404);
        }
    }
}
