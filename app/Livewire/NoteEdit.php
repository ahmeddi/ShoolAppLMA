<?php

namespace App\Livewire;

use App\Models\Note;
use App\Models\Classe;
use Livewire\Component;
use App\Models\Etudiant;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class NoteEdit extends Component
{
    public $visible = false;

    #[Rule('required')] 
    public $classe, $date, $nb,$prof,$titre,$note,$pos,$lang;

    public $ids;

    public $classes=[];
    public $profs;


    #[On('edit')]
    public function open($id) 
    {      
        $this->resetErrorBag();
        $this->resetValidation();

       $note =  Note::find($id);


        $this->classe = $note->etudiant->classe_id;
        $this->date = $note->date;
        $this->nb = $note->etudiant->nb;
        $this->prof = $note->prof;
        $this->titre = $note->titre;
        $this->note = $note->text;
        $this->pos = $note->pos;
        $this->lang = $note->lang;

        $this->ids = $id;

        $this->visible = true;
    }

    function save()  {

        $this->resetErrorBag();
        $this->resetValidation();

       $this->validate();

       $etud = Etudiant::where('classe_id',$this->classe)
       ->where('nb',$this->nb)
       ->first();

        $msgar = 'الرقم غير موجود';
        $msgfr = 'Le numéro n\' existe pas';

        if (app()->getLocale() == 'ar') {
        $msg = $msgar;
        } else {
        $msg = $msgfr;
        }

        if (!$etud) {
            $this->addError('nb', $msg);
            return;
        }



       Note::find($this->ids)->update([
        'date' => $this->date,
        'titre' => $this->titre,
        'prof' => $this->prof,
        'pos' => $this->pos,
        'text' => $this->note,
        'etudiant_id' => $etud->id,
        'lang' => $this->lang,
       ]);

        $this->dispatch('refresh');
         $this->visible = false;

        
    }
    
    public function render()
    {
        $this->classes = Classe::all('id','nom');

        return view('livewire.note-edit');
    }
}
