<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Etudiant;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;

class EtudeDel extends Component
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
        Etudiant::find($this->key)->delete();

        $local = app()->getLocale();

        return redirect()->route('Etudiants', ['locale' => $local]);


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
        return view('livewire.etude-del');
    }
}
