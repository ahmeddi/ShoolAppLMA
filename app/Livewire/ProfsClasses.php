<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ProfClass;
use Livewire\Attributes\On;

class ProfsClasses extends Component
{

    public $ids;
    public $records = [];

    #[On('delete')]
    function delete($key)  
    {
        ProfClass::where('id', $key)->delete();
        $this->render();

    }

    #[On('refresh')]
    public function render()
    {
        $this->records =  ProfClass::where('prof_id',$this->ids)->get();

        return view('livewire.profs-classes');
    }
}
