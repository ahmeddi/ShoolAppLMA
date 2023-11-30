<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use App\Models\PaiementParent;
use App\Services\WhatsappApiService;

class ParentPaiementsAdd extends Component
{
    public $visible = false;

    public $ids;

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




       $paiements  = PaiementParent::create([
            'parent_id' => $this->ids,
            'date' => $this->date,
            'montant' => $this->montant,
        ]);

        /*
        $recet = new WhatsappApiService();
        $msg = $recet->recets('36411579','');

        $paiements->update([
            'wh' => $msg,
        ]); 

        */



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

        return view('livewire.parent-paiements-add');
    }
}
