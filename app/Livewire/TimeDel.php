<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;

class TimeDel extends Component
{
    public $visible = false;
    public $idkey ;
    public $clas;

    #[Js]
    public function close()
    {
        return <<<'JS'
            $wire.visible = false;
        JS;
    }

    #[On('delTime')] 
    public function open($id) 
    {
        $this->idkey = $id;

        $this->visible = true;

    }

    public function del()
    {
        $this->visible = false;

        $this->dispatch('delete', $this->idkey);

    }
    public function render()
    {
        return view('livewire.time-del');
    }
}
