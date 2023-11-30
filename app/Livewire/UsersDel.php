<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;

class UsersDel extends Component
{
    public $visible = false;
    public $key ;

    #[On('dle')]
    public function open($id) 
    {
        $this->key = $id;

        $this->visible = true;

    }
    public function del()
    {
        $this->dispatch('delete', $this->key);

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
        return view('livewire.users-del');
    }
}
