<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\BadgeEtud;
use Livewire\Attributes\On;

class EtudeProfil extends Component
{
    public $etud;

    public $badges = [];



    #[On('refresh')]
    public function render()
    {
        $this->badges = BadgeEtud::where('etudiant_id', $this->etud->id)->get();

        return view('livewire.etude-profil');
    }
}
