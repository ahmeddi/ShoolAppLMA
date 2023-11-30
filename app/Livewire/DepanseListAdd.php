<?php

namespace App\Livewire;

use App\Models\DepanceEnt;
use Livewire\Component;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class DepanseListAdd extends Component
{
    public $visible = false;

    #[Rule('required')] 
    public $dep;



    #[On('add')] 
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

       DepanceEnt::create(['nom'   => $this->dep,]);

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
        return view('livewire.depanse-list-add');
    }
}
