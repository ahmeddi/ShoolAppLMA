<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Attande;
use Livewire\Component;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class EtudAttListAdd extends Component
{
    public $visible = false;

    public $etud;

    #[Rule('required')]
    public $date, $nbh;



    #[On('pattl')]
    public function open() 
    {      
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset('date','nbh');

        $this->date = Carbon::today()->format('Y-m-d') ;


        $this->visible = true;
    }



    public function save()
    {
        $this->resetErrorBag();
        $this->resetValidation();

       $this->validate();

       if(app()->getLocale() == 'ar'){
          $msg = 'يوجد سجل لهاذا اليوم';
         }else{
            $msg = 'il y a un enregistrement pour ce jour';
         }

       if (Attande::where('date',$this->date)
                  ->where('etudiant_id',$this->etud)
                  ->count()) {
            $this->addError('date', $msg);
       } else {
        
        Attande::create([
            'etudiant_id'   => $this->etud,
            'nbh'  => $this->nbh,
            'date' => $this->date,
          ]);

          
        $this->dispatch('refresh');
        $this->visible = false;


       }
       
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
        return view('livewire.etud-att-list-add');
    }
}
