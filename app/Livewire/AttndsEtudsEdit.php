<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Classe;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class AttndsEtudsEdit extends Component
{
    public $visible = false;

    public $Profs=[];

    #[Rule('required',as: ' ')] 
    public $nbh, $classe, $date, $nb;


    public $moy;


    #[On('ettudop')]
    public function open() 
    {      
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset();

        $this->date = Carbon::today()->format('Y-m-d') ;


        $this->Profs = Classe::all();
        $this->visible = true;
    }
    
    public function render()
    {
        return view('livewire.attnds-etuds-edit');
    }
}
