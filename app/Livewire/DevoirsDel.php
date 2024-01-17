<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;

class DevoirsDel extends Component
{
    public $visible = false;
    public $key;

    #[On('dtls')]
    public function open($id)
    {
        $this->key = $id;

        $this->visible = true;
    }


    public function del()
    {
        $this->visible = false;

        $this->dispatch('deletes', $this->key);
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
        return view('livewire.devoirs-del');
    }
}
