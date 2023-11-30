<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class ClassEdits extends Component
{

    public $Classe;
    
    #[On('refresh')] 
    public function render()
    {
        return view('livewire.class-edits');
    }
}
