<?php

namespace App\Livewire;

use App\Models\Dette;
use Livewire\Component;
use Livewire\Attributes\On;

class Dettes extends Component
{
    public $entreprise_id;

    #[On('delete')]
    function delete($idkey)  
    {
        Dette::find($idkey)->delete();
        $this->render();

    }

    #[On('refresh')]
    public function render()
    {
        $detts = Dette::where('entreprise_id',$this->entreprise_id)->get();

        return view('livewire.dettes',['dettes'=>$detts]);
    }
}
