<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Classe;
use App\Models\Profil;
use App\Models\Parentt;
use Livewire\Component;
use App\Models\Etudiant;
use App\Models\Fraisetud;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class EtudParAdd extends Component
{

    public $Classes;

    public $list = 0;

    public $prId;

    public $visible = false;


    #[Rule('required')] 
    public $nom;

    public $nomfr;

    public $ddn;

    public $nc;

    #[Rule('required|not_in:0')] 
    public $sexe;

    public $nni;


    #[Rule('required')] 
    public $nb;

    public $nbs;

    #[Rule('required|not_in:0')] 
    public $cls;

    public $etudiant;



    #[On('add')] 
    public function open() 
    {
        $this->resetErrorBag();
        $this->resetValidation();

        $this->visible = true;
    }

    
    public function num()
    {
        $class = Classe::find($this->cls);
    
        if (!$class) {
            $this->nbs = '';
        } elseif ($class->etuds->count()) {
            $lastEtud = $class->etuds->last();
            $this->nbs = intval($lastEtud->nb) + 1;
        } else {
            $this->nbs = 1;
        }
    }


    public function submit()
    { 
        $this->resetErrorBag();
        $this->resetValidation();

        $this->validate();


        

        $this->etudiant =   Etudiant::create([
            'nom'   => $this->nom,
            'nomfr'  => $this->nomfr,
            'ddn'  => $this->ddn,
            'nc' => $this->nc,
            'sexe' => intval($this->sexe),
            'nni' => $this->nni,
            'nb' => $this->nb,
            'classe_id' => $this->cls,
            'parent_id' => $this->prId,
            'list' => $this->list,
          ]); 

          $profil =  Profil::find(1);

          $recet = $profil->recet;
          $mois = $profil->mois;
 
          $classMont = $this->etudiant->classe->prix;
 
          $frais = (intval($mois) * intval($classMont)) + intval($recet);

          Fraisetud::create([
            'etudiant_id' =>  $this->etudiant->id,
            'parent_id' => $this->prId,
            'montant' =>  $frais,
            'motif' => 1,
            'mois'=> Carbon::now()->month,
            'annee'=> Carbon::now()->year,
            'date' => now()->format('Y-m-d'),
          ]);


        $this->resetExcept('prId');
        $this->dispatch('refresh');

        $this->visible = false;

    }

    
    #[Js]
    public function close()
    {
        return <<<'JS'
            $wire.visible = false;
        JS;
    }

    public function render()
    {
        $this->Classes = Classe::select('id', 'nom')->get();

        return view('livewire.etud-par-add');
    }
}
