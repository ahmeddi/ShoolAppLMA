<?php

namespace App\Livewire;

use Livewire\Component;

class ProfsClassesNotes extends Component
{
    public $classes= [];
    public $prof;

    public function mount($prof)
    {
        $this->prof = $prof;
        $this->classes = $prof->classes;
    }


    public function render()
    {
        return view('livewire.profs-classes-notes');
    }
}
