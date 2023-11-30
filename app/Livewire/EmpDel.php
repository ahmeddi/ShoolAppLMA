<?php

namespace App\Livewire;

use App\Models\Emp;
use Livewire\Component;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;

class EmpDel extends Component
{
    public $visible = false;
    public $key ;

    #[On('del')]
    public function open($id) 
    {
        $this->key = $id;

        $this->visible = true;

    }
    public function del()
    {
        Emp::find($this->key)->delete();

        $local = app()->getLocale();

        return redirect()->route('Emps', ['locale' => $local]);


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
        return view('livewire.emp-del');
    }
}
