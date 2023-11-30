<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\EmpRemise;
use Illuminate\Support\Str;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class EmpRemisesEdit extends Component
{
    public $visible = false;

    public $ids,$note;
    public $pid;

    #[Rule('required',as: ' ')]
    public $date;

    
    #[Rule('required|numeric', as:' ')] 
    public $montant;


    #[On('edit')]
    public function open($id) {

        $this->resetErrorBag();
        $this->resetValidation();

        $paiment = EmpRemise::find($id);

        $this->pid = $paiment->id;
        $this->montant = $paiment->montant;
        $this->date = $paiment->date;
        $this->note = $paiment->note;
   
        $this->visible = true;

    }


    public function save()
    {
        if($this->montant) {
            $this->montant = Str::replace(' ', '', $this->montant);
        }

   
         $this->resetErrorBag();
         $this->resetValidation();

        $this->validate();


        EmpRemise::find($this->pid)->update([
            'montant' => $this->montant,
            'date' => $this->date,
            'note' => $this->note,
        ]);

            $this->visible = false;

            $this->dispatch('refresh');


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
        return view('livewire.emp-remises-edit');
    }
}
