<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Entreprise;
use Illuminate\Support\Str;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class EntrepriseEdit extends Component
{
    protected $listeners = ['open' => 'open',];

    public $visible = false;

    #[Rule('required')] 
    public $nom,$telephone;

    
    public $whatsapp;
    public $email;
    public $telephone2;

    public $ids;



    #[On('edit')]   
    public function open($id) 
    {

        $this->resetErrorBag();
        $this->resetValidation();
        
        
        $entreprise = Entreprise::find($id);
        $this->nom = $entreprise->nom;
        $this->telephone = $entreprise->telephone;
        $this->whatsapp = $entreprise->whatsapp;
        $this->email = $entreprise->email;
        $this->telephone2 = $entreprise->telephone2;
        $this->ids = $entreprise->id;
        
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
        
        $this->resetErrorBag();
        $this->resetValidation();
        $this->validate();


            
        $entreprise = Entreprise::find($this->ids)->update([
            'nom' => $this->nom,
            'telephone' => $this->telephone,
            'whatsapp' => $this->whatsapp,
            'email' => $this->email,
            'telephone2' => $this->telephone2,
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
        return view('livewire.entreprise-edit');
    }
}
