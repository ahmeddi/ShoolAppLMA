<?php

namespace App\Livewire;

use App\Models\Depance;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class DepensesEntsEdit extends Component
{
    public $visible = false;
    public $detail;  

    public $ent;

    #[Rule('required')]
    public $date;

    public $montant;


    protected $rules = [
        'montant' => 'required|numeric',
    ];

    public $idd;


    #[On('edit')]
    public function open($ids) {

        
        $id = Depance::find($ids);


        $this->idd = $id->id;
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

        $this->montant = Str::replace(' ', '', $this->montant);

        
            $this->resetErrorBag();
            $this->resetValidation();

            $this->validate();


            $cours = Depance::find($this->idd);

            $cours->titre = null;
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
        return view('livewire.depenses-ents-edit');
    }
}
