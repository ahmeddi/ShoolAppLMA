<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class EmpProfil extends Component
{

    public $emp;
    
    #[On('refresh')]
    public function render()
    {
        return view('livewire.emp-profil');
    }
}
