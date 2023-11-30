<?php

namespace App\Livewire;

use App\Models\Depance;
use Livewire\Component;
use App\Models\DepanceEnt;
use Livewire\Attributes\On;

class DepensesEnts extends Component
{
    public $ids;
    public $depanses;

    #[On('delete')]
    function delete($idkey)  
    {
      Depance::find($idkey)->delete();
        $this->render();

    }
    

    #[On('refresh')]
    public function render()
    {
        $this->depanses =  DepanceEnt::with('depanses')->find($this->ids);
        

        if ($this->depanses->depanses) {
            $this->depanses =  $this->depanses->depanses;
        }

        return view('livewire.depenses-ents');
    }
}
