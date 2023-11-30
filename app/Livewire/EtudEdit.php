<?php

namespace App\Livewire;

use App\Models\Classe;
use Livewire\Component;
use App\Models\Etudiant;
use App\Models\Parentt;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class EtudEdit extends Component
{

    public $Classes;

    public $visible = false;


    #[Rule('required')] 
    public $nom,$nomfr;

    public $ddn;
    public $soir;

    public $textColors = []; 


    public $nc;

    #[Rule('required|not_in:0')] 
    public $sexe;

    public $nni;


    #[Rule('required')] 
    public $nb;

    public $nbs;

    #[Rule('required|not_in:0')] 

    public $cls,$mid;

    public $etud;

    public $list;


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






    #[On('open')] 
    public function open($id) 
    {      
        $this->resetErrorBag();
        $this->resetValidation();

         $etud = Etudiant::find($id);

        $this->nom = $etud->nom;
        $this->nomfr = $etud->nomfr;
        $this->nni = $etud->nni;
        $this->nc = $etud->nc;
        $this->sexe = $etud->sexe;
        $this->nb = $etud->nb;
        $this->ddn = $etud->ddn;
        $this->cls = $etud->classe_id;
        $this->list = $etud->list;
        $this->soir = $etud->soir;

        $this->mid = $etud->id;

        $this->visible = true;

    }

    public function submit()
    {

        $this->resetErrorBag();
        $this->resetValidation();

        $this->validate();


           $etud = Etudiant::find($this->mid);

           $etud->nom = $this->nom;
           $etud->nomfr = $this->nomfr;
           $etud->nni = $this->nni;
           $etud->ddn = $this->ddn;
           $etud->nc = $this->nc;
           $etud->sexe = $this->sexe;
           $etud->classe_id = $this->cls ;
           $etud->nb = $this->nb ;
           $etud->list = $this->list ;
            $etud->soir = $this->soir ;

           $etud->save();

   
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


        return view('livewire.etud-edit');
    }

}
