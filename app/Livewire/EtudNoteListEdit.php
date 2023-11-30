<?php

namespace App\Livewire;

use App\Models\Note;
use Livewire\Component;
use App\Models\Etudiant;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class EtudNoteListEdit extends Component
{
    public $visible = false;

    #[Rule('required')] 
    public $date, $prof,$titre,$note,$pos,$lang;

    public $ids;
    public $etud;



    #[On('edit')]
    public function open($id) 
    {      
        $this->resetErrorBag();
        $this->resetValidation();

       $note =  Note::find($id);


        $this->date = $note->date;
        $this->prof = $note->prof;
        $this->titre = $note->titre;
        $this->note = $note->text;
        $this->pos = $note->pos;
        $this->etud = $note->etudiant_id;
        $this->lang = $note->lang;

        $this->ids = $id;

        $this->visible = true;
    }

    function save()  {

        $this->resetErrorBag();
        $this->resetValidation();

       $this->validate();


       Note::find($this->ids)->update([
        'date' => $this->date,
        'titre' => $this->titre,
        'prof' => $this->prof,
        'pos' => $this->pos,
        'text' => $this->note,
        'etudiant_id' => $this->etud,
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
        return view('livewire.etud-note-list-edit');
    }
}
