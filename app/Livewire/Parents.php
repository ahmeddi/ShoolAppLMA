<?php

namespace App\Livewire;

use App\Models\Parentt;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class Parents extends Component
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
        
        $parents = Parentt::where('nom', 'like', '%'.$this->search.'%')
        ->orWhere('nomfr', 'like', '%'.$this->search.'%')
        ->orWhere('telephone', 'like', '%'.$this->search.'%')
        ->orWhere('telephone2', 'like', '%'.$this->search.'%')
        ->orWhere('whatsapp', 'like', '%'.$this->search.'%')
        ->orderBy('id', 'desc')
        ->paginate(5);
        return view('livewire.parents',['parents' => $parents]);
    }
}
