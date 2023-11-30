<?php

namespace App\Livewire;

use App\Models\Mat;
use Livewire\Component;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;

class MattDel extends Component
{
    public $visible = false;
    public $key ;



    #[Js]
    public function close()
    {
        return <<<'JS'
            $wire.visible = false;
        JS;
    }

    #[On('mattdel')] 
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


    public function render()
    {
        return view('livewire.matt-del');
    }
}
