<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Classe;
use App\Models\PaiementParent;
use App\Models\Parentt;
use Livewire\Component;

class ParentsDettes extends Component
{
    public $Dettes= [];

    public $date;
    public $day1, $day2;

    public $t_month;
    public $p_month;
    public $all;

    public $classes = [];

    public $selectedClasseId;

    public $orderByOption;

    public $sortBy = '1';

    public $parents = [];






   public function mount()
   {
      


      $this->selectedClasseId = '*';

      $this->thisMonth();

      

      
 
    }





      public function thisMonth()
      {
        $now = Carbon::now();
        $from = $now->startOfMonth()->format('Y-m-d') ;
        $to = $now->copy()->endOfMonth()->format('Y-m-d') ;



        $this->date =[$from, $to];
        
        $this->reset(['day1','day2',]);

        $this->t_month = true;
        $this->p_month = false;
        $this->all = false;

        $this->fetchData();


      }



      public function randday()
      {
        $from = Carbon::parse($this->day1)->format('Y-m-d');
        $to = Carbon::parse($this->day2)->format('Y-m-d');


        $this->date =[$from, $to];

        $this->t_month = false;
        $this->p_month = false;
        $this->all = false;

        $this->fetchData();


      }

      public function pastMonth()
      {
        $now = Carbon::now();
        $from = $now->copy()->subMonthNoOverflow()->startOfMonth()->format('Y-m-d');
        $to = $now->copy()->subMonthNoOverflow()->endOfMonth()->format('Y-m-d');


        $this->date = [$from, $to];

        $this->reset(['day1', 'day2']);

        $this->t_month = false;
        $this->p_month = true;
        $this->all = false;

        $this->fetchData();


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

          $this->fetchData();

      }

      /*
      public function solde()
      {
          $totalFrais = $this->etuds->flatMap(function ($etudiant) {
              return $etudiant->frais;
          })->sum('montant');

          $totalRemises = $this->remises->sum('montant');
          $totalPaiements = $this->paiements->sum('montant');

          return $totalFrais - $totalRemises - $totalPaiements;
      }
      */



      public function fetchData()
      {


        
        $query = Parentt::with(['etuds.frais', 'remises', 'paiements']);



        if ($this->selectedClasseId != '*') {
          $query->whereHas('etuds.classe', function ($subQuery) {
              $subQuery->where('id', $this->selectedClasseId);
          });
        }

        $parents = $query->get();

        $parents = $parents->map(function ($parent) {
            $paiementsSum = $parent->paiements->sum('montant');
            
            $totalFrais = $parent->etuds->flatMap(function ($etudiant) {
                return $etudiant->frais;
            })->sum('montant');

            $totalRemises = $parent->remises->sum('montant');
            $solde = -$totalFrais + $totalRemises + $paiementsSum;

            $paiments = PaiementParent::where('parent_id', $parent->id)
              ->whereBetween('date', [$this->date[0], $this->date[1]])
              ->sum('montant');


         //   dd($paiments);
           // $paiments = $parent->paiements->whereDate('date', $this->date)->sum('montant');



            // Add solde to the Parentt model
            $parent->setAttribute('paiements_sum', $paiments)->setAttribute('solde', $solde);

            return $parent;

            
        });

        if ($this->sortBy === '1') {
            // Sort by "Paiements"
            $parents = $parents->sortByDesc('paiements_sum');
        } elseif ($this->sortBy === '2') {
            // Sort by "Solde +"
            $parents = $parents->sortByDesc('solde');
        } elseif ($this->sortBy === '3') {
            // Sort by "Solde -"
            $parents = $parents->sortBy('solde');
        }

    $this->parents = $parents;

   
}








    public function render()
    {

      $this->classes = Classe::select('id', 'nom')->get();
/*
        $query = [];
        Paiement::whereBetween('date', $this->date);

        if ($this->selectedOption !== '*') {
            $query->where('type_de_paiement', $this->selectedOption);
        }


        $query->orderByRaw("CAST($this->orderByOption AS SIGNED) DESC");

        $this->Dettes = $query->get();

    */





        return view('livewire.parents-dettes');
    }
}
