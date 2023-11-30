<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\DepanceEnt;
use Livewire\Attributes\On;

class DepanseList extends Component
{
    public $Deps ;

    #[On('refresh')] 
    function mount() 
    {
        $this->Deps = DepanceEnt::select('id', 'nom')->get();
    }

    #[On('delete')]
    function delete($idkey)  
    {
        DepanceEnt::find($idkey)->delete();
        $this->mount();

    }

    
    public function render()
    {
        return view('livewire.depanse-list');
    }
}
