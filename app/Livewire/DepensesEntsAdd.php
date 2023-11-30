<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Depance;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class DepensesEntsAdd extends Component
{
    public $visible = false;
    public $detail;  

    public $ent;

    #[Rule('required')]
    public $date;

    public $montant;


    protected $rules = [
        'montant' => 'required|numeric',
    ];



    #[On('open')]
    public function open() {

        $this->date = Carbon::today()->format('Y-m-d') ;

     
        $this->visible = true;

    }

    #[Js]
    public function close()
    {
        return <<<'JS'
            $wire.visible = false;
        JS;
    }

    public function save()
    {
    
        if($this->montant) {
            $this->montant = Str::replace(' ', '', $this->montant);
        }

         $this->resetErrorBag();
         $this->resetValidation();


        $this->validate();

        Depance::create([
            'titre'   => null,
            'montant'  => $this->montant,
            'date' => $this->date,
            'details' => $this->detail,
            'depance_ent_id' => $this->ent,
        ]);
    

            $this->visible = false;

            $this->reset();
            $this->dispatch('refresh');
    }


    public function render()
    {
        return view('livewire.depenses-ents-add');
    }
}
