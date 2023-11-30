<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Etudiant;
use App\Models\Prof;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;

class ProfDel extends Component
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
        Prof::find($this->key)->delete();

        $local = app()->getLocale();

        return redirect()->route('Profs', ['locale' => $local]);


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
        return view('livewire.prof-del');
    }
}
