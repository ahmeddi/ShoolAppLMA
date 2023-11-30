<?php

namespace App\Livewire;

use App\Models\Emp;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class Emps extends Component
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
        $Emps = Emp::where('nom', 'like', '%'.$this->search.'%')
        ->orWhere('nomfr', 'like', '%'.$this->search.'%')
        ->orWhere('id', 'like', '%'.$this->search.'%')
        ->orWhere('tel1', 'like', '%'.$this->search.'%')
        ->orWhere('tel2', 'like', '%'.$this->search.'%')
        ->orWhere('nni', 'like', '%'.$this->search.'%')
        ->orWhere('ms', 'like', '%'.$this->search.'%')
        ->orderBy('id', 'desc')
        ->paginate(5);
        return view('livewire.emps',['Emps' => $Emps]);
    }
}
