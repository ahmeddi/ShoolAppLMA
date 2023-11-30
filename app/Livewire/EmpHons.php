<?php

namespace App\Livewire;

use App\Models\EmpHon;
use Livewire\Component;
use Livewire\Attributes\On;

class EmpHons extends Component
{
    public $emp;

    #[On('delete')]
    function delete($idkey)  
    {
      EmpHon::find($idkey)->delete();
        $this->render();

    }

    #[On('refresh')] 
    public function render()
    {
        $hons = EmpHon::where('emp_id',$this->emp)->get();

        return view('livewire.emp-hons',['cots'=>$hons,]);
    }
}
