<?php

namespace App\Livewire;

use App\Models\Mat;
use Livewire\Component;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class MattEdit extends Component
{
    public $visible = false;

    #[Rule('required')] 
    public $nom ;

    public $mid;


   // protected $listeners = ['mattedit' => 'open',];


    #[On('mattedit')] 
    public function open($id) 
    {      
        $this->resetErrorBag();
        $this->resetValidation();

        
        $mat = Mat::find($id);
        $this->nom = $mat->nom;
        $this->mid = $mat->id;

        $this->visible = true;
    }

    public function save()
    {

         $this->resetErrorBag();
         $this->resetValidation();

         $this->validate();

            $mat = Mat::find($this->mid);

            $mat->nom = $this->nom;


            $mat->save();
    
           $this->dispatch('refresh');
           $this->visible = false;

    }


    #[Js]
    public function close()
    {
        return <<<'JS'
            $wire.visible = false;
        JS;
    }
    
    public function render()
    {
        return view('livewire.matt-edit');
    }
}
