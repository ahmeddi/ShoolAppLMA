<?php

namespace App\Livewire;

use App\Models\Attande;
use Livewire\Component;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;

class EtudAttListDel extends Component
{
    public $visible = false;
    public $key ;

    #[On('open')] 
    public function open($id) 
    {
        $this->key = $id;

        $this->visible = true;

    }


    public function del()
    {
        $this->visible = false;

        $this->dispatch('delete', $this->key);
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
        return view('livewire.etud-att-list-del');
    }
}
