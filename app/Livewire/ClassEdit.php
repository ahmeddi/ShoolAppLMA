<?php

namespace App\Livewire;

use App\Models\Classe;
use Livewire\Component;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class ClassEdit extends Component
{
    public $visible = false;

    #[Rule('required')] 
    public $nom;

    #[Rule('required')] 
    public $prix;

   #[Rule('required')] 
    public $moy;

    public $soir;


    public $cid;



    #[On('open')] 
    public function open() 
    { 
        $this->resetErrorBag();
        $this->resetValidation();

        $classe = Classe::find($this->cid);   
        $this->nom = $classe->nom;
        $this->prix = $classe->prix;
        $this->moy = $classe->moy;
        $this->cid = $classe->id;
        $this->soir = $classe->soir;

        $this->visible = true;
    }

    public function submit()
    {

         $this->resetErrorBag();
         $this->resetValidation();

         $this->validate();

        $classe = Classe::find($this->cid);

        $classe->nom = $this->nom;
        $classe->prix = $this->prix;
        $classe->moy = $this->moy;
        $classe->soir = $this->soir;

        $classe->save();
    
        $this->dispatch('refresh'); //    #[On('refresh')] 
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
        return view('livewire.class-edit');
    }
}
