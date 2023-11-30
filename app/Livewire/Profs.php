<?php

namespace App\Livewire;

use App\Models\Prof;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class Profs extends Component
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
        $Profs = Prof::where('nom', 'like', '%'.$this->search.'%')
        ->orWhere('nomfr', 'like', '%'.$this->search.'%')
        ->orWhere('id', 'like', '%'.$this->search.'%')
        ->orWhere('tel1', 'like', '%'.$this->search.'%')
        ->orWhere('tel2', 'like', '%'.$this->search.'%')
        ->orWhere('nni', 'like', '%'.$this->search.'%')
        ->orWhere('se', 'like', '%'.$this->search.'%')
        ->orWhere('diplom', 'like', '%'.$this->search.'%')
        ->orderBy('id', 'desc')
        ->paginate(7);
        return view('livewire.profs',['Profs' => $Profs]);
    }

}
