<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Semestre;

class CLasseNotes extends Component
{
    public $classe;
    public $sems;
    public $mats;
    public $devs;
    public $exams;
    public $results = [];
    public $filts = 1;

    public $sem;
    public $mat;
    public $score;

    public $classMatAverages = [];

    public function mount()
    {
        $this->results = $this->classe->results;





        $this->sems = Semestre::all('id', 'nom', 'nomfr');
        $this->mats = $this->classe->mats;
        $this->devs = $this->classe->devs;

        foreach ($this->mats as $mat) {
            $this->classMatAverages[$mat->id] = round($this->classe->avg($mat->id), 2);
        }
    }

    public function filterResults()
    {
        $this->results = $this->classe->results;


        if (!empty($this->score)) {
            if ($this->results) {

                if ($this->filts == 1) {
                    $this->results = $this->results->filter(function ($result) {
                        return $result->note >= $this->score;
                    });
                } else if ($this->filts == 2) {
                    $this->results = $this->results->filter(function ($result) {
                        return $result->note <  $this->score;
                    });
                }
            }
        }

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
        // if ($this->score && $this->score !== '*') {
        //     if ($this->score == 1) {
        //         $this->results = $this->results->filter(function ($result) {
        //             return $result->note >= 10;
        //         });
        //     } else {
        //         $this->results = $this->results->filter(function ($result) {
        //             return $result->note < 10;
        //         });
        //     }
        // }
    }

    public function render()
    {
        return view('livewire.c-lasse-notes');
    }
}
