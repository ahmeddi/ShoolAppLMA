<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class ProfProfil extends Component
{

    public $prof;

    #[On('refresh')]
    public function render()
    {
        return view('livewire.prof-profil');
    }
}
