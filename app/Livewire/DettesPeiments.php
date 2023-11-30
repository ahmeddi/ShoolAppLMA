<?php

namespace App\Livewire;

use App\Models\DettePaiement;
use Livewire\Component;
use Livewire\Attributes\On;

class DettesPeiments extends Component
{
    public $entreprise_id;

    #[On('delete-pei')]
    function delete($idkey)  
    {
        DettePaiement::find($idkey)->delete();
        $this->render();
    }

    #[On('refresh')]
    public function render()
    {
        $paeiments = DettePaiement::where('entreprise_id',$this->entreprise_id)->get();

        return view('livewire.dettes-peiments',['paiements'=>$paeiments]);
    }
}
