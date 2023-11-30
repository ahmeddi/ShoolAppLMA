<?php

namespace App\Livewire;

use App\Models\Emp;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class EmpAdd extends Component
{
    public $visible = false;
    
    #[Rule('required')] 
    public $nom;

    #[Rule('required|unique:emps,tel1', as:' ')] 
    public $tel1;

    public $nomfr,$tel2,$nni,$ms,$post;



    #[On('open')]   
    public function open() 
    {      

        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset();

        $this->visible = true;
    }

    public function save()
    {

        if($this->tel1) {
            $this->tel1 = Str::replace(' ', '', $this->tel1);
        }

        if($this->tel2) {
            $this->tel2 = Str::replace(' ', '', $this->tel2);
        }

       
         $this->resetErrorBag();
         $this->resetValidation();


        $this->validate();

        Emp::create([
           'nom'   => $this->nom,
           'nomfr'  => $this->nomfr,
           'tel1'  => $this->tel1,
           'tel2'  => $this->tel2,
           'nni'  => $this->nni,
           'ms'  => $this->ms,
           'post'  => $this->post,

         ]);

            $this->dispatch('refresh');
            $this->reset();


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
        return view('livewire.emp-add');
    }
}
