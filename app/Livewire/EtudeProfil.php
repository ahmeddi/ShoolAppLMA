<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class EtudeProfil extends Component
{
    public $etud;

    #[On('refresh')] 
    public function render()
    {
        return view('livewire.etude-profil');
    }
}
