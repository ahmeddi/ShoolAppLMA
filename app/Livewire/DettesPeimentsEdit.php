<?php

namespace App\Livewire;

use App\Models\DettePaiement;
use Livewire\Component;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class DettesPeimentsEdit extends Component
{
    #[Rule('required')]
    public $date;

    
    #[Rule('required|numeric', as:' ')] 
    public $montant;


    public $entreprise_id;

    public $visible = false;

    public $eid;

   
    #[On('dett-edit-pei')]
    public function open($id)
    {
        $this->resetErrorBag();
        $this->resetValidation();

        $dette = DettePaiement::find($id);
        
        $this->montant = $dette->montant;
        $this->date = $dette->date;

        $this->eid = $dette->id;

        $this->visible = true;
   }

   public function save()
   {
    
        if($this->montant)
        {
            $this->montant = str_replace(' ', '', $this->montant);
        }
       $this->resetErrorBag();
       $this->resetValidation();

       $this->validate();

       DettePaiement::find($this->eid)->update([
           'montant' => $this->montant,
           'date' => $this->date,
       ]);

       $this->dispatch('refresh');

       $this->visible = false;

       $this->reset();



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
        return view('livewire.dettes-peiments-edit');
    }
}
