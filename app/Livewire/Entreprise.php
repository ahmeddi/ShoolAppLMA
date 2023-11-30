<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Entreprise as Entreprises;
use Livewire\Attributes\On;

class Entreprise extends Component
{
    public $entreprise;




    #[On('refresh')] 
    public function render()
    {
        $entreprise = Entreprises::find($this->entreprise->id);

        $paiements = $entreprise->paiements->sum('montant');



        $sold = $paiements - $this->entreprise->dettes->where('type',1)->sum('montant');

        return view('livewire.entreprise', [
            'sold' => $sold,
        ]);
    }
}
