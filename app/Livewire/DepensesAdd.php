<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Depance;
use Livewire\Component;
use App\Models\DepanceEnt;
use Illuminate\Support\Str;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class DepensesAdd extends Component
{
    public $visible = false;
    public $detail;  
    public $ents = [];   

    



    public $idd;


    public $enom;   

    public $mid;

    #[Rule('required')]
    public $date;

    public $montant;


    #[Rule('required_if:ent,==,0', as: ' ')]
    public $titre;

    #[Rule('nullable', as: ' ')]
    public $ent;

    protected $rules = [
        'montant' => 'required|numeric',
    ];



    #[On('open')]
    public function open() {

        $this->date = Carbon::today()->format('Y-m-d') ;

     
        $this->visible = true;

        $this->ents = DepanceEnt::all('id','nom')->toArray();

    }

    #[Js]
    public function close()
    {
        return <<<'JS'
            $wire.visible = false;
        JS;
        $this->reset();

    }

    public function save()
    {

        if ($this->montant) {
            $this->montant = Str::replace(',', '.', $this->montant);
        }


        
         $this->resetErrorBag();
         $this->resetValidation();


        $this->validate();

        if($this->ent == 0){
            $this->ent = null;
        }
        else
        {
            $this->titre = null;
        }

        Depance::create([
            'titre'   => $this->titre,
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
        return view('livewire.depenses-add');
    }
}
