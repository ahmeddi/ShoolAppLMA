<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Semestre;
use Livewire\Attributes\On;

class CLasseNotesMoyMat extends Component
{
    public $classe;
    public $etuds = [];
    public $moy_sem = 1;

    public $males;
    public $females;
    public $total;
    public $etudFiltre;

    public $mat = 1;
    public $mats = [];
    public $moy_etud;
    public $filts_moy = 1;
    public $sems = [];

    #[On('openMoyMat')]
    public function mounts()
    {
        $this->sems = Semestre::all('id', 'nom', 'nomfr');

        $this->mats = $this->classe->mats;

        $this->mat = $this->mats->first()->id;

        $this->etuds = $this->classe->etuds->each(function ($etud) {
            $etud->moy = $etud->moysMat($this->moy_sem, $this->mat);
        });

        if ($this->moy_etud) {
            if ($this->etuds) {
                if ($this->filts_moy == 1) {
                    $this->etuds = $this->etuds->filter(function ($etud) {
                        return floatval($etud->moy)  >= floatval($this->moy_etud);
                    });
                } else if ($this->filts_moy == 2) {
                    $this->etuds = $this->etuds->filter(function ($etud) {
                        return $etud->moy <  $this->moy_etud;
                    });
                }
            }
        }

        $this->males = $this->etuds->where('sexe', '1')->count();
        $this->females = $this->etuds->where('sexe', '2')->count();

        $this->etudFiltre = true;

        $this->total = $this->etuds->count();
    }


    public function filterMoy()
    {

        $this->etuds = $this->classe->etuds->each(function ($etud) {
            $etud->moy = $etud->moys($this->moy_sem);
        });

        $this->total = $this->etuds->count();

        $this->etuds = $this->classe->etuds->each(function ($etud) {
            $etud->moy = $etud->moysMat($this->moy_sem, $this->mat);
        });

        if ($this->moy_etud) {
            if ($this->etuds) {
                if ($this->filts_moy == 1) {
                    $this->etuds = $this->etuds->filter(function ($etud) {
                        return floatval($etud->moy)  >= floatval($this->moy_etud);
                    });
                } else if ($this->filts_moy == 2) {
                    $this->etuds = $this->etuds->filter(function ($etud) {
                        return $etud->moy <  $this->moy_etud;
                    });
                }
            }
        }

        $this->males = $this->etuds->where('sexe', '1')->count();
        $this->females = $this->etuds->where('sexe', '2')->count();


        $this->total == $this->etuds->count() ? $this->etudFiltre = true : $this->etudFiltre = false;
    }



    public function render()
    {
        return view('livewire.c-lasse-notes-moy-mat');
    }
}
