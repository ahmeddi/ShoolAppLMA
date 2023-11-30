<?php

namespace App\Livewire;

use App\Models\Attande;
use Livewire\Component;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class EtudAttListEdit extends Component
{
    public $visible = false;
    public $olddate;

    public $prof1;
    public $ids;

    #[Rule('required')]
    public $date, $nbh;



    #[On('open')]
    public function open($id) 
    {      
        $att = Attande::find($id);

         $this->prof1 = $att->etudiant_id;
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

       $att = Attande::find($this->ids);

            $att->etudiant_id = $this->prof1;
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
        return view('livewire.etud-att-list-edit');
    }
}
