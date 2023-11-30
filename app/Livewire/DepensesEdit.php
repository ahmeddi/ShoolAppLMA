<?php

namespace App\Livewire;

use App\Models\Depance;
use Livewire\Component;
use App\Models\DepanceEnt;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class DepensesEdit extends Component
{
    public $visible = false;
    public $detail;  
    public $ents = [];   

    public $montant,$date;

    public $idd;

    #[Rule('required_if:ent,==,0', as: ' ')]
    public $titre;

    #[Rule('nullable', as: ' ')]
    public $ent;



    #[On('edit')]
    public function open($ids) {

        
        $id = Depance::find($ids);


        $this->idd = $id->id;
        $this->titre = $id->titre;
        $this->montant = $id->montant;
        $this->date =  $id->date;
        $this->detail = $id->details;
        $this->ent = $id->depance_ent_id;
     
     
        $this->visible = true;

    }

    #[Js]
    public function close()
    {
        return <<<'JS'
            $wire.visible = false;
        JS;
    }

    public function save()
    {

        
            $this->resetErrorBag();
            $this->resetValidation();

            $this->validate();

            if($this->ent == 0){
                $this->ent = null;
            }
            else{
                $this->titre = null;
            }

            $cours = Depance::find($this->idd);

            $cours->titre = $this->titre;
            $cours->montant = $this->montant;
            $cours->date = $this->date;
            $cours->details = $this->detail;
            $cours->depance_ent_id = $this->ent;
       
           $cours->save();
    
           $this->dispatch('refresh');

           $this->visible = false;

    }


    public function render()
    {
        $this->ents = DepanceEnt::select('id', 'nom')->get();

        return view('livewire.depenses-edit');
    }
}
