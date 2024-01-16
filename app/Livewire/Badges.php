<?php

namespace App\Livewire;

use App\Models\Badge;
use Livewire\Component;
use App\Models\BadgeEtud;
use Livewire\Attributes\On;

class Badges extends Component
{
    public $etud;

    public $badges = [];


    #[On('refresh')]
    public function mount()
    {
        $this->badges = BadgeEtud::where('etudiant_id', $this->etud->id)->get();
    }

    #[On('delete')]
    function delete($idkey)
    {
        BadgeEtud::find($idkey)->delete();
        $this->render();
    }

    public function render()
    {
        $this->badges = BadgeEtud::where('etudiant_id', $this->etud->id)->get();

        return view('livewire.badges');
    }
}
