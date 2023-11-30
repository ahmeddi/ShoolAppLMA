<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Attandep;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class EmpAttListEdit extends Component
{
    public $visible = false;
    public $olddate;

    public $emp;
    public $ids;

    #[Rule('required')]
    public $date, $nbh;



    #[On('edit')]
    public function open($id) 
    {      
        $att = Attandep::find($id);

         $this->emp = $att->emp_id;
         $this->nbh  = $att->nbh;
         $this->date = $att->date;
         $this->olddate = $att->date;
         $this->ids = $att->id;


        $this->visible = true;
    }



    public function save()
    {
        $this->resetErrorBag();
        $this->resetValidation();

       $this->validate();

       $att = Attandep::find($this->ids);

            $att->emp_id = $this->emp;
            $att->nbh = $this->nbh ;
            $att->date = $this->date;
            $att->save();

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
        return view('livewire.emp-att-list-edit');
    }
}
