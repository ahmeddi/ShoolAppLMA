<?php

namespace App\Livewire;

use App\Models\DettePaiement;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class DettesPeimentsAdd extends Component
{
    #[Rule('required')]
    public $date;

    
    #[Rule('required|numeric', as:' ')] 
    public $montant;


    public $entreprise_id;

    public $visible = false;

    #[On('open-new-pei')]
    public function open()
    {

        $this->resetErrorBag();
        $this->resetValidation();

        $this->date = Carbon::now()->format('Y-m-d');

        $this->visible = true;
    }

    public function save()
    {
        if($this->montant)
        {
            $this->montant = str_replace(' ', '', $this->montant);
        }

        $this->resetErrorBag();
        $this->resetValidation();

        $this->validate();


        DettePaiement::create([
            'entreprise_id' => $this->entreprise_id,
            'montant' => $this->montant,
            'date' => $this->date,
        ]);



        $this->dispatch('refresh');

        $this->resetExcept('entreprise_id');
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
        return view('livewire.dettes-peiments-add');
    }
}
