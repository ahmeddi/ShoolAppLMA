<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;

class AttndsProfsDel extends Component
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

    #[On('del')] 
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
        return view('livewire.attnds-profs-del');
    }
}
