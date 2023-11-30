<?php

namespace App\Livewire;

use App\Models\ProfHon;
use Livewire\Component;
use Livewire\Attributes\On;

class ProfHons extends Component
{

    public $prof;

    #[On('delete')]
    function delete($idkey)  
    {
      ProfHon::find($idkey)->delete();
        $this->render();

    }

    #[On('refresh')] 
    public function render()
    {
        $hons = ProfHon::where('prof_id',$this->prof)->get();

        return view('livewire.prof-hons',[
            'cots' => $hons,
        ]);
    }
}
