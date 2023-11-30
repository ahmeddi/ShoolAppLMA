<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Note;
use App\Models\Prof;
use App\Models\Classe;
use Livewire\Component;
use App\Models\Etudiant;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class NoteAdd extends Component
{
      
    public $visible = false;

    #[Rule('required',as: ' ')] 
    public $classe, $date, $nb,$prof,$titre,$note,$pos,$lang;

    public $classes=[];
    public $profs;


    #[On('ettudop')]
    public function open() 
    {      
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset();

        $this->date = Carbon::today()->format('Y-m-d') ;


        $this->classes = Classe::all('id','nom');

        $this->visible = true;
    }



    public function save()
    {
        $this->resetErrorBag();
        $this->resetValidation();


       $this->validate();


       

       $etud = Etudiant::where('classe_id',$this->classe)
                     ->where('nb',$this->nb)
                     ->latest()->first();


        $msgar = 'الرقم غير موجود';
        $msgfr = 'Le numéro n\' existe pas';

        if (app()->getLocale() == 'ar') {
          $msg = $msgar;
        } else {
            $msg = $msgfr;
        }

        if ($etud) {

            
            Note::create([
                'etudiant_id'   => $etud->id,
                'prof'   => $this->prof,
                'pos'   => $this->pos,
                'titre'  => $this->titre,
                'text'  => $this->note,
                'date' => $this->date,
                'lang' => $this->lang,
                ]);

                $this->dispatch('refresh');
                $this->visible = false;

            }
        
        else{
            $this->addError('nb', $msg);
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
        return view('livewire.note-add');
    }
}
