<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Classe;
use App\Models\Attande;
use Livewire\Component;
use App\Models\Etudiant;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class AttndsEtudsAdd extends Component
{
    public $visible = false;

    public $Classes=[];

    #[Rule('required',as: ' ')] 
    public $nbh, $classe, $date, $nb;


    public $moy;


    #[On('ettudop')]
    public function open() 
    {      
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset();

        $this->date = Carbon::today()->format('Y-m-d') ;


        $this->Classes = Classe::all();
        $this->visible = true;
    }



    public function save()
    {
        $this->resetErrorBag();
        $this->resetValidation();

       $this->validate();


       

       $etud = Etudiant::where('classe_id',$this->classe)
                     ->where('nb',$this->nb)
                     ->first();

        $msg = app()->getLocale() == 'ar' ? 'يوجد سجل لهذا اليوم' : 'Il y a un enregistrement pour ce jour';
        $msg2 = app()->getLocale() == 'ar' ? 'الرقم غير موجود' : 'Le numéro n existe pas';
    

        if (!$etud) {
            $this->addError('nb', $msg2);
        } else {
            Attande::firstOrCreate(
                ['date' => $this->date, 'etudiant_id' => $etud->id],
                ['nbh' => $this->nbh]
            );
        
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
        return view('livewire.attnds-etuds-add');
    }
}
