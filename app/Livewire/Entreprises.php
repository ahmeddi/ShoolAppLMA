<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Entreprise;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class Entreprises extends Component
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
        
        $entreprises = Entreprise::where('nom', 'like', '%'.$this->search.'%')
        ->orWhere('telephone', 'like', '%'.$this->search.'%')
        ->orWhere('email', 'like', '%'.$this->search.'%')
        ->orderBy('id', 'desc')
        ->paginate(5);

        return view('livewire.entreprises',['entreprises' => $entreprises]);
    }
}
