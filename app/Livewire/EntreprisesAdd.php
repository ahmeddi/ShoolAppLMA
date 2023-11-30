<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Entreprise;
use Illuminate\Support\Str;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class EntreprisesAdd extends Component
{

    public $visible = false;

    #[Rule('required')] 
    public $nom,$telephone;

    
    public $whatsapp;
    public $email;
    public $telephone2;



    #[On('open')]   
    public function open() 
    {

        $this->resetErrorBag();
        $this->resetValidation();
        
        
        $this->reset();
     
        $this->visible = true;

    }


    public function save()
    { 

        if ($this->telephone) {
            $this->telephone = Str::replace(' ', '', $this->telephone);
        }
        if ( $this->whatsapp) {
            $this->whatsapp = Str::replace(' ', '', $this->whatsapp);
        }
        if ($this->telephone2) {
            $this->telephone2 = Str::replace(' ', '', $this->telephone2);

        }




    //    $this->telephone2 = Str::replace(' ', '', $this->telephone2);
    //    $this->whatsapp = Str::replace(' ', '', $this->whatsapp);

       
        $this->resetErrorBag();
        $this->resetValidation();
        $this->validate();


            
        Entreprise::create([
            'nom'   => $this->nom,
            'telephone' => $this->telephone,
            'telephone2' => $this->telephone2,
            'whatsapp' => $this->whatsapp,
            'email' => $this->email,
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
        return view('livewire.entreprises-add');
    }
}
