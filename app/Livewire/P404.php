<?php

namespace App\Livewire;

use Livewire\Component;

class P404 extends Component
{
    function back($locale, $url) 
    {
        return redirect()->back();
        
    }


    public function render()
    {
        return view('livewire.p404');
    }
}
