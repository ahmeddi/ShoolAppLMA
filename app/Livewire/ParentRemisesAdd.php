<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\RemisParent;
use Illuminate\Support\Str;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class ParentRemisesAdd extends Component
{
    public $visible = false;

    public $ids;

    #[Rule('required',as: ' ')]
    public $date;

    
    #[Rule('required|numeric', as:' ')] 
    public $montant;

    public $note;


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


        RemisParent::create([
            'parent_id' => $this->ids,
            'date' => $this->date,
            'montant' => $this->montant,
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
        $this->date = Carbon::now()->format('Y-m-d');
        return view('livewire.parent-remises-add');
    }
}
