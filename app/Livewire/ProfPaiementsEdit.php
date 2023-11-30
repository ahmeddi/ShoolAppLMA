<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use App\Models\ProfPaiement;
use Livewire\Attributes\Rule;

class ProfPaiementsEdit extends Component
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

        $paiment = ProfPaiement::find($id);

        $this->pid = $paiment->id;
        $this->montant = $paiment->montant;
        $this->date = $paiment->date;
        $this->motif = $paiment->motif;
        $this->note = $paiment->note;
   
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


        ProfPaiement::find($this->pid)->update([
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
        return view('livewire.prof-paiements-edit');
    }
}
