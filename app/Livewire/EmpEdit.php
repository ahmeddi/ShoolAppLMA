<?php

namespace App\Livewire;

use App\Models\Emp;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class EmpEdit extends Component
{
    public $visible = false;

    #[Rule('required')] 
    public $nom,$tel1;

    public $nomfr,$tel2,$nni,$ms,$post;

    public $mid;

    public $list;


    #[On('open')]
    public function open($id) 
    {      
        $this->resetErrorBag();
        $this->resetValidation();

        $prof = Emp::find($id);
         
        $this->nom = $prof->nom;
        $this->nomfr = $prof->nomfr;
        $this->tel1 = $prof->tel1;
        $this->tel2 = $prof->tel2;
        $this->nni = $prof->nni;
        $this->post = $prof->post;
        $this->ms = $prof->ms;
        $this->list = $prof->list;

        $this->mid = $prof->id;

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

        $prof = Emp::find($this->mid);

        $prof->nom = $this->nom;
        $prof->nomfr = $this->nomfr;
        $prof->tel1 = $this->tel1;
        $prof->tel2 = $this->tel2;
        $prof->nni = $this->nni;
        $prof->post = $this->post;
        $prof->ms = $this->ms;
        $prof->list = $this->list;


        $prof->save();

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
        return view('livewire.emp-edit');
    }
}
