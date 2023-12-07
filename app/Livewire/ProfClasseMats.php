<?php

namespace App\Livewire;

use App\Models\Mat;
use App\Models\Prof;
use App\Models\Classe;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\ProfClassesResult;
use App\Models\ProfMatsResult;

class ProfClasseMats extends Component
{
    public $ids;
    public $records = [];

    #[On('delete')]
    function delete($key)  
    {
        ProfClassesResult::where('id', $key)->delete();
        $this->render();

    }

    #[On('refresh')]
    public function render()
    {
        $this->records =  ProfClassesResult::where('prof_id',$this->ids)->get();

        return view('livewire.prof-classe-mats');
    }
}
