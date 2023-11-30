<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Note;
use Livewire\Component;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class EtudNoteListAdd extends Component
{
    public $visible = false;

    #[Rule('required',as: ' ')] 
    public  $date, $prof,$titre,$note,$pos,$lang;

    public $etud;


    #[On('opens')]
    public function open() 
    {  

        $this->resetErrorBag();
        $this->resetValidation();

        $this->date = Carbon::today()->format('Y-m-d') ;

        $this->visible = true;
    }



    public function save()
    {
        $this->resetErrorBag();
        $this->resetValidation();

       $this->validate();



            
            Note::create([
                'etudiant_id'   => $this->etud,
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

    #[Js]
    public function close()
    {
        return <<<'JS'
            $wire.visible = false;
        JS;
    }
    

    public function render()
    {
        return view('livewire.etud-note-list-add');
    }
}
