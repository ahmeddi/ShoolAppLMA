<?php

namespace App\Livewire;

use App\Models\Prof;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class ProfAdd extends Component
{
    public $visible = false;

    public $nomfr;

    #[Rule('required')]
    public $nom;

    #[Rule('required|unique:profs,tel1|max:8|min:8',as:' ')]
    public $tel1;

    public $tel2;

    #[Rule('nullable|unique:profs,nni,',as:' ')]
    public $nni;

    public $diplom;

    #[Rule('nullable|unique:profs,se,',as:'')]
    public $se;

    #[Rule('required',as:' ')]
    public $ts;

    #[Rule('required_if:ts,1',as:' ')]
    public $ms;


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

        if($this->tel1) 
        { 
            $this->tel1 = Str::replace(' ', '', $this->tel1);
        }
        if($this->tel2)
        {
            $this->tel2 = Str::replace(' ', '', $this->tel2);
        }



         $this->resetErrorBag();
         $this->resetValidation();

         $this->nni == '' ? $this->nni = null : $this->nni = $this->nni;
         $this->se == ''  ? $this->se = null  : $this->se = $this->se;
         $this->ts == ''  ? $this->ts = null  : $this->ts = $this->ts;


        $this->validate();

        if($this->ts == 2) { $this->ms = null; }



        Prof::create([
           'nom'   => $this->nom,
           'nomfr'  => $this->nomfr,
           'tel1'  => $this->tel1,
           'tel2'  => $this->tel2,
           'nni'  => $this->nni,
           'diplom'  => $this->diplom,
           'se'  => $this->se,
           'ts'  => $this->ts,
           'ms'  => $this->ms,

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
        return view('livewire.prof-add');
    }
}
