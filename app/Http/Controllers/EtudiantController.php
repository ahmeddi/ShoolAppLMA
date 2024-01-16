<?php

namespace App\Http\Controllers;

use App\Models\Etudiant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class EtudiantController extends Controller
{
    public function attetud($locale, $ids)
    {
        if (auth()->user()->role == 'prof') {
            abort(403);
        }

        $etudiant = Etudiant::find($ids);

        if (!$etudiant) {
            abort(404);
        }

        if (auth()->user()->parent_id) {
            if (auth()->user()->parent_id == $etudiant->parent_id) {
                if (Gate::allows('view', $etudiant)) {
                    return view('EtudAtt', ['etud' => $etudiant]);
                } else {
                    abort(403);
                }
            } else {
                abort(403);
            }
        }

        return view('EtudAtt', ['etud' => $etudiant]);
    }

    public function note($locale, $ids)
    {
        if (auth()->user()->role == 'prof') {
            abort(403);
        }

        $etudiant = Etudiant::find($ids);

        if (!$etudiant) {
            abort(404);
        }

        if (auth()->user()->parent_id) {
            if (auth()->user()->parent_id == $etudiant->parent_id) {
                if (Gate::allows('view', $etudiant)) {
                    return view('NoteList', ['etud' => $etudiant]);
                } else {
                    abort(403);
                }
            } else {
                abort(403);
            }
        }

        return view('NoteList', ['etud' => $etudiant]);
    }


    public function etudiantEco($locale, $ids)
    {
        if (auth()->user()->role == 'prof') {
            abort(403);
        }
        if (auth()->user()->parent_id) {
            abort(403);
        }

        $idss =  Etudiant::find($ids);

        if ($idss) {
            return view('EtudiantEco', ['etud' => $idss]);
        } else {
            return abort(404);
        }
    }

    public function frais($locale, $etud)
    {
        if (auth()->user()->parent_id or auth()->user()->role == 'prof') {
            abort(404);
        }

        if (Etudiant::find($etud)) {
            $etud = Etudiant::find($etud);
            return view('EtudiantFrais', ['etud' => $etud,]);
        } else {
            abort(404);
        }
    }

    public function show($locale, $etud)
    {
        if (auth()->user()->role == 'prof') {
            abort(403);
        }


        $etudiant = Etudiant::find($etud);

        if (!$etudiant) {
            abort(404);
        }

        if (auth()->user()->parent_id) {
            if (auth()->user()->parent_id == $etudiant->parent_id) {
                if (Gate::allows('view', $etudiant)) {
                    return view('Etudiant', ['etud' => $etudiant]);
                } else {
                    abort(403);
                }
            } else {
                abort(403);
            }
        }

        return view('Etudiant', ['etud' => $etudiant]);
    }


    public function badges($locale, $etud)
    {
        if (auth()->user()->parent_id or auth()->user()->role == 'prof') {
            abort(404);
        }

        if (Etudiant::find($etud)) {
            $etud = Etudiant::find($etud);
            return view('EtudiantBadges', ['etud' => $etud,]);
        } else {
            abort(404);
        }
    }
}
