<?php

namespace App\Livewire;

use App\Models\Classe;
use Livewire\Component;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class ClassAdd extends Component
{
    public $visible = false;

    #[Rule('required',as: ' ')] 
    public $nom, $prix;


    public $moy;

    public $soir;




    #[On('classadd')]
    public function open() 
    {      
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset();

        $this->visible = true;
    }

    public function save()
    {

         $this->resetErrorBag();
         $this->resetValidation();


        $this->validate();

        Classe::create([
           'nom'   => $this->nom,
           'prix'  => $this->prix,
           'moy'  => $this->moy,
            'soir'  => $this->soir,


         ]);

            $this->dispatch('refresh');
            $this->reset();


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
        return view('livewire.class-add');
    }
}
