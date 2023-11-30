<?php

namespace App\Livewire;

use App\Models\Dette;
use Livewire\Component;

class DettesEches extends Component
{
    public $dette;


    public function render()
    {
        $detts = Dette::with('echeances')->find($this->dette);

        return view('livewire.dettes-eches',['dettes' => $detts]);
    }
}
