<?php

namespace App\Livewire;

use App\Models\EmpSal;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class EmpPaiementsEdit extends Component
{
    public $visible = false;

    public $ids,$note;

    public $pid;


    #[Rule('required',as: ' ')]
    public $date,$motif;

    
    #[Rule('required|numeric', as:' ')] 
    public $montant;


    #[On('edit')]
    public function open($id) {

        $this->resetErrorBag();
        $this->resetValidation();

        $paiement = EmpSal::find($id);

        $this->pid = $paiement->id;
        $this->montant = $paiement->montant;
        $this->date = $paiement->date;
        $this->motif = $paiement->motif;
        $this->note = $paiement->note;


        
   
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

        EmpSal::find($this->pid)->update([
            'montant' => $this->montant,
            'date' => $this->date,
            'motif' => $this->motif,
            'note' => $this->note,
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
        return view('livewire.emp-paiements-edit');
    }
}
