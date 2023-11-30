<?php

namespace App\Livewire;

use NumberFormatter;
use App\Models\Profil;
use Livewire\Component;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use App\Models\PaiementParent;
use Carbon\Carbon;

class ParentPaiementsPrint extends Component
{
    public $visible = false;

    public $ids,$note;

    public $nom,$nomfr, $sexe;

    #[Rule('required',as: ' ')]
    public $montant = 6000,$date,$motif;

    public $chiffre,$chiffrear;

    public $header;



    #[On('print')]
    public function open($id) 
    {

        $paie = PaiementParent::find($id);

        $this->montant = $paie->montant;
        $this->date = $paie->date;
        $date = Carbon::parse($paie->date);
        $this->motif = $date->format('dmy').$paie->parent_id;

        $this->nom = $paie->parent->nom;
        $this->nomfr = $paie->parent->nomfr;
        $this->sexe = $paie->parent->sexe;

        $this->resetErrorBag();
        $this->resetValidation();

        $this->header = Profil::find(1)->header;

        $fr = new NumberFormatter('fr',NumberFormatter::SPELLOUT);
        $ar = new NumberFormatter('ar',NumberFormatter::SPELLOUT);

        $this->chiffre = $fr->format($this->montant);
        $this->chiffrear = $ar->format($this->montant);



   
        $this->visible = true;

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
        return view('livewire.parent-paiements-print');
    }
}
