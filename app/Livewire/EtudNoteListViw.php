<?php

namespace App\Livewire;

use App\Models\Note;
use Livewire\Component;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class EtudNoteListViw extends Component
{
    public $visible = false;

    #[Rule('required')] 
    public $date, $prof,$titre,$note,$pos;

    public $ids;
    public $etud;



    #[On('view')]
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

        $this->ids = $id;

        $this->visible = true;
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
        return view('livewire.etud-note-list-viw');
    }
}
