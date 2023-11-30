<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;

class DepensesEntsDel extends Component
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

    #[On('dels')] 
    public function open($ids) 
    {
        $this->idkey = $ids;

        $this->visible = true;

    }

    public function delete()
    {
        $this->visible = false;

        $this->dispatch('delete', $this->idkey);

    }

    public function render()
    {
        return view('livewire.depenses-ents-del');
    }
}
