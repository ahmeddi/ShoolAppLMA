<?php

namespace App\Livewire;

use App\Console\Commands\ProfSalaire;
use App\Models\DetteEch;
use App\Models\DettePaiement;
use App\Models\Etudiant;
use App\Models\Fraisetud;
use Carbon\Carbon;
use App\Models\Note;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Livewire\ParentPaiements;
use App\Models\Depance;
use App\Models\Dette;
use App\Models\EmpHon;
use App\Models\EmpSal;
use App\Models\PaiementParent;
use App\Models\ProfHon;
use App\Models\ProfPaiement;
use App\Models\RemisParent;

class Comps extends Component
{
    public $day1;
    public $day2;
    public $date;
    public $etud;
    


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
        
        $this->reset(['day1','day2',]);

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
        $frais = Fraisetud::whereBetween('date', $this->date)->sum('montant');
        $payed = PaiementParent::whereBetween('date', $this->date)->sum('montant');
        $remis = RemisParent::whereBetween('date', $this->date)->sum('montant');

        

        $recet = $payed;

        $peis = DettePaiement::whereBetween('date', $this->date)->sum('montant');

        $dettes = Dette::whereBetween('date', $this->date)->sum('montant');

        $dette = DetteEch::whereBetween('date', $this->date)->sum('montant');

        $prof_hon = ProfHon::whereBetween('date', $this->date)->sum('montant');
        $prof_sal = ProfPaiement::whereBetween('date', $this->date)->sum('montant');

        $emp_hon = EmpHon::whereBetween('date', $this->date)->sum('montant');
        $emp_sal = EmpSal::whereBetween('date', $this->date)->sum('montant');

        $sal = $prof_sal + $emp_sal;
        $hon = $prof_hon + $emp_hon;
        

        $depances = Depance::whereBetween('date', $this->date)->sum('montant');

      //  $comps = $recet - $depances  - $peis +  $dettes - $sal ;

        $comps = $recet + $dettes - $sal - $depances - $peis;

        return view('livewire.comps',[
            
              'frais' => $frais,
              'recet' => $recet,
              'peis' => $peis,
              'dettes' => $dettes,
              'depances' => $depances,
              'comps' => $comps,
              'dette' => $dette,
              'sal' => $sal,
              'hon' => $hon,

        ]);
    }
}
