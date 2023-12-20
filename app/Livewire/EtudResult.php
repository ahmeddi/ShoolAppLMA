<?php

namespace App\Livewire;

use App\Models\Semestre;
use Livewire\Component;

class EtudResult extends Component
{
    public $etudiant;
    public $sems;
    public $mats;
    public $devs;
    public $exams;
    public $results;

    public $sem;
    public $mat;
    public $score;

    public function mount()
    {
        $this->results = $this->etudiant->results;

        $this->sems = Semestre::all('id', 'nom', 'nomfr');
        $this->mats = $this->etudiant->classe->mats;
        $this->devs = $this->etudiant->classe->devs;
    }

    public function filterResults()
    {
        $this->results = $this->etudiant->results;

        // Filter by semester
        if ($this->sem && $this->sem !== '*') {
            $sem = (int) $this->sem;
            $this->results = $this->results->filter(function ($result) use ($sem) {
                return $result->examen->semestre_id == $sem;
            });
        }

        // Filter by mat
        if ($this->mat && $this->mat !== '*') {
            $this->results = $this->results->filter(function ($result) {
                return $result->mat_id == $this->mat;
            });
        }

        // Filter by score
        if ($this->score && $this->score !== '*') {
            if ($this->score == 1) {
                $this->results = $this->results->filter(function ($result) {
                    return $result->note >= 10;
                });
            } else {
                $this->results = $this->results->filter(function ($result) {
                    return $result->note < 10;
                });
            }
        }
    }


    public function render()
    {

        return view('livewire.etud-result',);
    }
}
