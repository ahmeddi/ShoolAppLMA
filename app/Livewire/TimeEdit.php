<?php

namespace App\Livewire;

use App\Models\Time;
use Livewire\Component;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class TimeEdit extends Component
{
    public $visible = false;

    #[Rule('required')] 
    public $time ;

    public $mid;




    #[On('timeEdit')] 
    public function open($id) 
    {      
        
        $this->resetErrorBag();
        $this->resetValidation();

        
        $time = Time::find($id);
        $this->time = $time->time;
        $this->mid = $time->id;

        $this->visible = true;
    }

    public function save()
    {

         $this->resetErrorBag();
         $this->resetValidation();

         $this->validate();

            $time = Time::find($this->mid);

            $time->time = $this->time;


            $time->save();
    
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
        return view('livewire.time-edit');
    }
}
