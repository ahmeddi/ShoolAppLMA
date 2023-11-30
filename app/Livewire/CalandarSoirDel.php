<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\SoirJorn;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;

class CalandarSoirDel extends Component
{
    
    public $visible = false;
    public $idkey ;

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

      $this->dispatch('delete', $this->idkey);

        $this->visible = false;

    }
    public function render()
    {
        return view('livewire.calandar-soir-del');
    }
}
