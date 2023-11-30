<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Etudiant;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class Etudiants extends Component
{
    use WithPagination;


 
    public $search='';

    public function updatingSearch()
    {
        $this->resetPage();
    }

    #[On('refresh')] 
    public function render()
    {
        
        $etudiants = Etudiant::where('nom', 'like', '%'.$this->search.'%')
        ->orWhere('nomfr', 'like', '%'.$this->search.'%')
        ->orWhere('id', 'like', '%'.$this->search.'%')
        ->with(['classe:id,nom'])
        ->orderBy('id', 'desc')
        ->paginate(5);
        return view('livewire.etudiants',['etudiants' => $etudiants]);
    }
}
