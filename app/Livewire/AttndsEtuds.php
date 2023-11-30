<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Classe;
use App\Models\Attande;
use Livewire\Component;
use App\Models\Etudiant;
use Livewire\Attributes\On;

class AttndsEtuds extends Component
{
    public $day1;
    public $day2;
    public $date;

    public $t_month = false;
    public $p_month = false;
    public $t_week = false;

    public $all = false;
    
     
    public function mount()
    {
        $now = Carbon::now();
        $from = $now->startOfMonth()->format('Y-m-d') ;
        $to = $now->endOfMonth()->format('Y-m-d') ;


        $this->date =[$from, $to];

        $this->t_month = true;
        $this->p_month = false;
        $this->all = false;
        $this->t_week = false;
    }
      public function thisMonth()
      {
        $now = Carbon::now();
        $from = $now->startOfMonth()->format('Y-m-d') ;
        $to = $now->endOfMonth()->format('Y-m-d') ;



        $this->date =[$from, $to];
        
        $this->reset(['day1','day2',]);

        $this->t_month = true;
        $this->p_month = false;
        $this->all = false;
        $this->t_week = false;

      }

      public function thisWeek()
      {
        $now = Carbon::now();
        $from = $now->startOfWeek()->format('Y-m-d') ;
        $to = $now->endOfWeek()->format('Y-m-d') ;


        $this->date =[$from, $to];
        $this->reset(['day1','day2',]);

        $this->t_month = false;
        $this->p_month = false;
        $this->all = false;
        $this->t_week = true;

      }

      public function randday()
      {
        $from = Carbon::parse($this->day1)->format('Y-m-d');
        $to = Carbon::parse($this->day2)->format('Y-m-d');


        $this->date =[$from, $to];

        $this->t_month = false;
        $this->p_month = false;
        $this->all = false;
        $this->t_week = false;

      }

      public function pastMonth()
      {
        $now = Carbon::now();
        $from = $now->startOfMonth()->subMonth()->format('Y-m-d') ;
        $to = $now->endOfMonth()->format('Y-m-d') ;



        $this->date =[$from, $to];
        $this->reset(['day1','day2',]);


        $this->t_month = false;
        $this->p_month = true;
        $this->all = false;
        $this->t_week = false;

      }

      public function alls()
      {
          $now = Carbon::now();
          $from = Carbon::parse('1-1-2000')->format('Y-m-d') ;
          $to = $now->format('Y-m-d') ;
          $this->date =[$from, $to];
  
          $this->t_month = false;
          $this->p_month = false;
          $this->all = true;
          $this->t_week = false;
      }


    #[On('refresh')]
    public function render()
    {
   //     dd(Attande::all());
       $attds = Attande::all()
                         ->whereBetween('date',$this->date)
                         ->map(function ($row){
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
            
        return view('livewire.attnds-etuds',['attds' => $attds]);
    }
}
