<?php

namespace App\Livewire;

use Livewire\Component;

class EtudResult extends Component
{
    public $etudiant;





    public function render()
    {
        $results = $this->etudiant->results;

        return view('livewire.etud-result',
        ['results' => $results,]
    );
    }
}
