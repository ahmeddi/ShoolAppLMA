<?php

namespace App\Livewire;

use App\Models\Mat;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class Matts extends Component
{
    use WithPagination;

    public $Matts ;

    #[On('refresh')] 
    function mount() 
    {
        $this->Matts = Mat::select('id', 'nom')->get();
    }

    #[On('delete')]
    function delete($idkey)  
    {
        Mat::find($idkey)->delete();
        $this->mount();

    }

    
    public function render()
    {
        return view('livewire.matts');
    }
}
