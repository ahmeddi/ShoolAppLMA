<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Dette;
use Livewire\Component;
use App\Models\DetteEch;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class DettesEdit extends Component
{


     #[Rule('required')]
     public $type,$date;

     public $montant;

     #[Rule('required_if:type,==,1')]
     public $datep,$echances;

     protected $rules = [
        'montant' => 'required|numeric',
    ];


     public $intret;
     public $visible = false;

     public $eid;

    
     #[On('dett-edit')]
     public function open($id)
     {
         $dette = Dette::find($id);
         
         $this->type = $dette->type;
         $this->montant = $dette->montant;
         $this->date = $dette->date;
         $this->datep = $dette->start_date;
         $this->echances = $dette->eche;
         $this->intret = $dette->interet;
         $this->eid = $dette->id;

         $this->visible = true;
    }

    public function save()
    {
        $this->resetErrorBag();
        $this->resetValidation();

        $this->validate();

        $detts =  Dette::find($this->eid)->update([
            'montant' => $this->montant,
            'date' => $this->date,
            'start_date' => $this->datep,
            'eche' => $this->echances,
            'interet' => $this->intret,
            'type' => $this->type,
        ]);

        $this->eid = $detts->id;

       $echs =  DetteEch::where('dette_id', $this->eid);

       if ($echs) 
       {
            $echs->delete();
       }

       if ($this->type == 1) 
       {
            $montant = $this->montant + $this->montant * ($this->intret / 100);
            $installmentAmount = floor($montant / $this->echances);
            $rest = $montant % $this->echances;
            $startDate = Carbon::parse($this->datep);

            for ($i = 0; $i < $installmentAmount; $i++) 
            {
                $this->createDetteEch($this->eid, $this->echances, $i + 1, $startDate);
                $startDate->addMonth();
            }

            if ($rest !== 0) 
            {
                $this->createDetteEch($this->eid, $rest, $i + 1, $startDate);
            }
         }
         else
         {
            Dette::find($this->eid)->update([

                'start_date' => null,
                'eche' => null,
                'interet' => null,
            ]);
         }

        $this->dispatch('refresh');
        $this->resetExcept('entreprise_id');


        $this->visible = false;

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
        return view('livewire.dettes-edit');
    }
}
