<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Enums\Dates;
use App\Models\Note;
use App\Models\Classe;
use Livewire\Component;
use App\Models\Etudiant;
use App\Traits\Rangables;
use Livewire\Attributes\On;
use App\Services\WhatsappApiService;

class Notes extends Component
{
  use Rangables;

  public function mount()
  {

      $this->ranges = Dates::cases();

      $this->rangeName = Dates::All_Time->label();
  
      $casesToKeep = ['month', 'today','week', 'past_month', 'all', 'custom'];
  
      $this->ranges = array_filter($this->ranges, function ($case) use ($casesToKeep) {
        return in_array($case->value, $casesToKeep);
      });

      $this->selectedRange = 'month';

      $this->rangeName =  __('calandar.month');
  }


      #[On('delete')]
      function delete($idkey)  
      {
          Note::find($idkey)->delete();
          $this->mount();
  
      }

      #[On('wh')]
      function wh($id)
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
        $note->titre,
        $code,
        $note->lang
      );

        $note->wh = $msg;
        $note->save();
        $this->mount();
        
      }


    #[On('refresh')]
    public function render()
    {
      $this->table_col_id =  'all';
      $this->table_col_date = 'date';
  
      $notes = Note::get();
  
      $notes = $this->updatedSelectedRange($notes);

      $notes =  $notes->map(function ($row){
        $Etudiant_id = $row->etudiant_id;
        $Etudiant =  Etudiant::find($Etudiant_id);
        $Etudiant_nom = $Etudiant->nom;
        $Etudiant_nomfr = $Etudiant->nomfr;
        $Etudiant_nb = $Etudiant->nb;
        $Etudiant_classe = $Etudiant->classe_id;
        $Etudiant_cls = Classe::find($Etudiant_classe)->nom;

        return [
                'idn' => $row->id, 
                'id' => $Etudiant_id, 
                'nom' => $Etudiant_nom,
                 'nomfr' => $Etudiant_nomfr,
                'nb' =>  $Etudiant_nb,
                'classe' => $Etudiant_cls,
                'nbp' => $row->titre,
                'prof' => $row->prof,
                'pos' => $row->pos,
                'wh' => $row->wh,
                'date' => Carbon::parse($row->date)->format('Y-m-d')

                ]
                ;} )
     ;
        return view('livewire.notes',['attds' => $notes]);
    }
}
