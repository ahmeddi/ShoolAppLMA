<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\Attandep;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class EmpAttListAdd extends Component
{
    
    public $visible = false;

    public $emp;

    #[Rule('required')]
    public $date, $nbh;



    #[On('open')]
    public function open() 
    {      
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset('date','nbh');

        $this->date = Carbon::today()->format('Y-m-d') ;


        $this->visible = true;
    }



    public function save()
    {
        $this->resetErrorBag();
        $this->resetValidation();

       $this->validate();

       Attandep::create([
        'date' => $this->date,
        'emp_id' => $this->emp,
        'nbh' => $this->nbh
    ]);
    
        $this->dispatch('refresh');
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
        return view('livewire.emp-att-list-add');
    }
}
