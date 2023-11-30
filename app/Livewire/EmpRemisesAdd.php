<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\EmpRemise;
use Illuminate\Support\Str;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class EmpRemisesAdd extends Component
{
    public $visible = false;

    public $ids,$note;

    #[Rule('required',as: ' ')]
    public $date;

    
    #[Rule('required|numeric', as:' ')] 
    public $montant;


    #[On('open')]
    public function open() {

        $this->resetErrorBag();
        $this->resetValidation();

        $this->resetExcept('ids');
   
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


        EmpRemise::create([
            'emp_id' => $this->ids,
            'date' => $this->date,
            'montant' => $this->montant,
            'note' =>  $this->note,
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
        $this->date = Carbon::now()->format('Y-m-d');

        return view('livewire.emp-remises-add');
    }
}
