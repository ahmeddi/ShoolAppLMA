<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Enums\Dates;
use App\Models\Note;
use Livewire\Component;
use App\Traits\Rangables;
use Livewire\Attributes\On;
use App\Services\WhatsappApiService;

class EtudNoteList extends Component
{

     
  use Rangables;

  public $etud;
  public $ids;

    
      public function mount()
      {


            $this->ranges = Dates::cases();

            $this->rangeName = Dates::All_Time->label();
        
        
            $casesToKeep = ['month', 'today','week', 'past_month', 'all', 'custom'];
        
            $this->ranges = array_filter($this->ranges, function ($case) use ($casesToKeep) {
              return in_array($case->value, $casesToKeep);
            });

            $this->selectedRange = 'all';

            $this->rangeName =  __('calandar.tous');

            $this->ids = $this->etud->id;
      }

      #[On('delete')]
      function delete($idkey)  
      {
          Note::find($idkey)->delete();
          $this->mount();
  
      }

      #[On('wh')]
      public function wh($id)
      {
        $note = Note::find($id);
        $etud = $note->etudiant;
        $parent = $etud->parent;
        $recet = new WhatsappApiService();
        $num = $parent->whatsapp;
        $code = $parent->whcode;
        $msg = $recet->notes($num,
        $etud->nom,
        $etud->nomfr,
        $parent->nom,
        $parent->nomfr,
        $note->text,
        $code,
        $note->lang
      );

      if ($msg) {
        $note->wh = 1;
        $note->save();
      }
    }


    #[On('refresh')]
    public function render()
    {


        $this->table_col_id =  'etudiant_id';
        $this->table_col_date = 'date';
    
        $notes = Note::orderBy('date', 'desc');
    
        $notes = $this->updatedSelectedRange($notes);
      
        $notes =  $notes->get();
       
        return view('livewire.etud-note-list',[
            'notes' => $notes,
        ]);
    }
}
