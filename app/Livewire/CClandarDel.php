<?php

namespace App\Livewire;

use App\Models\Lesson;
use Livewire\Component;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;

class CClandarDel extends Component
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

    #[On('open')] 
    public function open($id) 
    {
        $this->idkey = $id;

        $this->visible = true;

    }

    public function delete()
    {
        $this->visible = false;

        $this->dispatch('delete', $this->idkey);

    }

    
    public function render()
    {
        return view('livewire.c-clandar-del');
    }
}
