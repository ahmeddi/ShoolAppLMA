<?php

namespace App\Livewire;

use App\Models\Prof;
use Livewire\Component;
use App\Models\Semestre;
use Illuminate\Support\Arr;

class CLasseNotes extends Component
{
    public $classe;
    public $sems;
    public $mats;
    public $devs;
    public $exams;
    public $results = [];
    public $moys = [];
    public $moy_sem = 1;
    public $etuds = [];
    public $moy_etud;
    public $filts_moy;



    public $filts = 1;

    public $sem = 1;
    public $mat;
    public $score;

    public $classMatAverages = [];

    public function mount()
    {
        $this->results = $this->classe->results->sortByDesc('note')->take(5);



        $this->sems = Semestre::all('id', 'nom', 'nomfr');
        $this->mats = $this->classe->mats;

        if (auth()->user()->role == 'prof') {
            $this->mats = Prof::find(auth()->user()->prof_id)->mats;

            $matIds = $this->mats->pluck('id')->toArray();

            $this->results = $this->classe->results()
                ->orderByDesc('note')
                ->whereIn('mat_id', $matIds)
                ->take(5)
                ->get();

        }

        $this->devs = $this->classe->devs;
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
    }
}
