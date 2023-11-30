<?php

namespace App\Livewire;

use App\Models\Classe;
use Livewire\Component;
use Livewire\Attributes\On;

class Classes extends Component
{
    #[On('delete')]
    function delete($idkey)  
    {
        Classe::find($idkey)->delete();
        $this->render();

    }

    #[On('refresh')]
    public function render()
    {
        $Classs = Classe::with('etuds')->get();
        return view('livewire.classes',['Classs' => $Classs]);
    }
}
