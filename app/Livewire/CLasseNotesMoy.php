<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Semestre;
use Livewire\Attributes\On;

class CLasseNotesMoy extends Component
{

    public $classe;
    public $etuds = [];
    public $moy_sem = 1;
    public $moy_etud;
    public $filts_moy = 1;
    public $sems = [];

    public $males;
    public $females;
    public $total;
    public $etudFiltre;

    #[On('openMoy')]
    public function mounts()
    {

        $this->etuds = $this->classe->etuds->each(function ($etud) {
            $etud->moy = $etud->moys($this->moy_sem);
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

        if ($this->moy_sem) {
            $sem = (int) $this->moy_sem;
            $this->etuds = $this->etuds->filter(function ($etud) use ($sem) {
                return $etud->moys($sem) > 0;
            });
        }

        $this->males = $this->etuds->where('sexe', '1')->count();
        $this->females = $this->etuds->where('sexe', '2')->count();


        $this->total == $this->etuds->count() ? $this->etudFiltre = true : $this->etudFiltre = false;
    }


    public function render()
    {
        $this->sems = Semestre::all('id', 'nom', 'nomfr');

        return view('livewire.c-lasse-notes-moy');
    }
}
