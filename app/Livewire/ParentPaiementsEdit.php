<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use App\Models\PaiementParent;

class ParentPaiementsEdit extends Component
{
    
    public $visible = false;

    public $ids;

    public $pids;


    #[Rule('required',as: ' ')]
    public $date;


    
    #[Rule('required|numeric', as:' ')] 
    public $montant;

    #[On('edit')]
    public function open($id) {

        $this->resetErrorBag();
        $this->resetValidation();

        $paiement = PaiementParent::find($id);

        $this->pids = $paiement->id;
        $this->montant = $paiement->montant;
        $this->date = $paiement->date;


   
        $this->visible = true;

    }


    public function save()
    {
        if($this->montant) {
            $this->montant = Str::replace(' ', '', $this->montant);
        }

   
         $this->resetErrorBag();
         $this->resetValidation();

        $this->validate();


        PaiementParent::find($this->pids)->update([
            'date' => $this->date,
            'montant' => $this->montant,
            'parent_id' => $this->ids,
        ]);

            $this->visible = false;

            $this->dispatch('refresh');


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
        return view('livewire.parent-paiements-edit');
    }
}
