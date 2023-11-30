<?php

namespace App\Livewire;

use App\Models\Time;
use Livewire\Component;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class TimeAdd extends Component
{
    public $visible = false;

    #[Rule('required')] 
    public $time;



    #[On('addTime')] 
    public function open() 
    {      
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset();

        $this->visible = true;
    }

    public function save()
    {
       $this->resetErrorBag();
       $this->resetValidation();

       $this->validate();

       Time::create(['time'   => $this->time,]);

       $this->dispatch('refresh');

       $this->reset();
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
        return view('livewire.time-add');
    }
}
