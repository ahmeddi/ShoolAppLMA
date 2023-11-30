<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\DepanceEnt;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class DepanseListEdit extends Component
{
    
    public $visible = false;

    #[Rule('required')] 
    public $dep ;

    public $mid;



    #[On('edit')] 
    public function open($id) 
    {      
        $this->resetErrorBag();
        $this->resetValidation();

        
        $mat = DepanceEnt::find($id);
        $this->dep = $mat->nom;
        $this->mid = $mat->id;

        $this->visible = true;
    }

    public function save()
    {

         $this->resetErrorBag();
         $this->resetValidation();

         $this->validate();

            $dep = DepanceEnt::find($this->mid);

            $dep->nom = $this->dep;

            $dep->save();
    
           $this->dispatch('refresh');
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
        return view('livewire.depanse-list-edit');
    }
}
