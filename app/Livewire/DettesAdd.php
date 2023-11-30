<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Dette;
use Livewire\Component;
use App\Models\DetteEch;
use Illuminate\Support\Str;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use App\Models\DettePaiement;
use Livewire\Attributes\Rule;

class DettesAdd extends Component
{
    #[Rule('required')]
    public $type,$date;

    
    #[Rule('required|numeric', as:' ')] 
    public $montant;

    #[Rule('required_if:type,==,1')]
    public $datep,$echances;

    public $entreprise_id;
    public $eid;

    public $intret;
    public $startDate;
    public $visible = false;

    #[On('open-new')]
    public function open()
    {

        $this->resetErrorBag();
        $this->resetValidation();

        $this->date = Carbon::now()->format('Y-m-d');

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

        $dette = Dette::create([
            'entreprise_id' => $this->entreprise_id,
            'montant' => intval($this->montant),
            'date' => $this->date,
            'start_date' => $this->datep,
            'eche' => $this->echances,
            'interet' => $this->intret,
            'type' => $this->type,
        ]);

        if ($this->type == 1) 
        {
            $montant = intval( $dette->montant) + intval($dette->montant)  * ( intval($dette->interet)  / 100);

            $installmentAmount = floor($montant / intval($this->echances));

         //   dd($montant, $this->echances, $installmentAmount);

            $rest = $montant % $this->echances;

            $startDate = Carbon::parse($this->datep);
            
            $installmentAmounts = [];

            for ($i = 0; $i < $this->echances; $i++) {
                $installmentAmounts[] = $installmentAmount;
            }

            if ($rest !== 0) {
                $installmentAmounts[] = $rest;
            }


            foreach ($installmentAmounts as $index => $amount) {
                $this->createDetteEch($dette->id, $amount, $index + 1, $startDate);
                $startDate->addMonth();
            }
        }


        $this->dispatch('refresh');
        $this->resetExcept('entreprise_id');
    }

    protected function createDetteEch($detteId, $montant, $nb, $startDate)
    {
        DetteEch::create([
            'dette_id' => $detteId,
            'montant' => $montant,
            'nb' => $nb,
            'date' => $startDate->format('Y-m-d'),
            'entreprise_id' => $this->entreprise_id,

        ]);
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
        return view('livewire.dettes-add');
    }
}
