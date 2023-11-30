<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Emp;
use App\Models\Attand;
use Livewire\Component;
use App\Models\Attandep;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class AttndsEmpsAdd extends Component
{
    public $visible = false;

    public $Profs=[];

    #[Rule('required',as: ' ')] 
    public $nbh, $emp, $date;

    public $Emps=[];


    public $moy;


    #[On('open')]
    public function open() 
    {      
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset();

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
        $this->Emps = Emp::all('id', 'nom');

        return view('livewire.attnds-emps-add');
    }
}
