<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class ParentProfil extends Component
{

    public $Parent;

    public $etuds;

    public $ids;

    public $frais;
    public $compts;

    public $paiements ;
    public $remises;





    #[On('refresh')]
    public function render()
    {
        $this->ids = $this->Parent->id;

        $this->etuds = $this->Parent->etuds;

        $this->frais = $this->etuds->flatMap->frais->sum('montant') ?? 0;        
        $this->paiements =  $this->Parent->paiements->sum('montant') ?? 0;
        $this->remises =  $this->Parent->remises->sum('montant') ?? 0;

        $this->compts = $this->paiements - $this->frais + $this->remises ?? 0;

        return view('livewire.parent-profil');
    }
}
