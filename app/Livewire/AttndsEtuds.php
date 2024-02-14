<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Enums\Dates;
use App\Models\Classe;
use App\Models\Attande;
use Livewire\Component;
use App\Models\Etudiant;
use App\Traits\Rangables;
use Livewire\Attributes\On;

class AttndsEtuds extends Component
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

    #[On('refresh')]
    public function render()
    {

      $this->table_col_id =  'all';
      $this->table_col_date = 'date';
  
      $attds = Attande::where('nbh' ,'>' ,0)
                             ->orderBy('date', 'desc');
  
      $attds = $this->updatedSelectedRange($attds);
    
      $attds =  $attds->get();

       $attds = $attds->map(function ($row){
                            $Etudiant_id = $row->etudiant_id;
                            $Etudiant =  Etudiant::find($Etudiant_id);
                            $Etudiant_nom = $Etudiant->nom ?? null;
                            $Etudiant_nomfr = $Etudiant->nomfr ?? null;
                            $Etudiant_nb = $Etudiant->nb ?? null;
                            $Etudiant_classe = $Etudiant->classe_id ?? null;
                            $Etudiant_cls = Classe::find($Etudiant_classe)->nom ?? null;

                            return [
                                    'id' => $Etudiant_id, 
                                    'nom' => $Etudiant_nom,
                                    'nomfr' => $Etudiant_nomfr,
                                    'nb' =>  $Etudiant_nb,
                                    'classe' => $Etudiant_cls,
                                    'nbp' => $row->nbh,
                                    'date' => Carbon::parse($row->date)->format('Y-m-d')

                                    ]
                                    ;} )
                         ;            
        return view('livewire.attnds-etuds',
        ['attds' => $attds]
      );
    }
}
