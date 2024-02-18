<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Enums\Dates;
use App\Models\Classe;
use App\Models\Parentt;
use Livewire\Component;
use App\Traits\Rangables;
use Livewire\Attributes\Url;
use App\Models\PaiementParent;

class ParentsDettes extends Component
{

  use Rangables;

  public $Dettes = [];

  public $date;
  public $day1, $day2;

  public $t_month;
  public $p_month;
  public $all;

  public $classes = [];

  #[Url]
  public $selectedClasseId;

  public $orderByOption;

  public $sortBy = '1';

 // public $parents = [];

  public $dateSelected;



  public function mount()
    {
        $this->selectedClasseId = '*';

      $this->ranges = Dates::cases();

      $this->rangeName = Dates::All_Time->label();
  
  
      $casesToKeep = ['month', 'today','week', 'past_month', 'all', 'custom'];
  
      $this->ranges = array_filter($this->ranges, function ($case) use ($casesToKeep) {
        return in_array($case->value, $casesToKeep);
      });

      $this->selectedRange = 'all';

      $this->rangeName =  __('calandar.tous');
    }



  public function mounts()
  {



    $this->selectedClasseId = '*';

    $this->dateSelected = '1';

    $this->thisMonth();
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

  function selectDate()
  {
    if ($this->dateSelected == '1') {
      $this->thisMonth();
    } elseif ($this->dateSelected == '2') {
      $this->pastMonth();
    } elseif ($this->dateSelected == '3') {
      $this->alls();
    } elseif ($this->dateSelected == '4') {
      $this->randday();
    }
  }



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

   // $this->parents = $parents;
  }








  public function render()
  {
    $this->table_col_id =  'all';
    $this->table_col_date = 'date';

    $this->classes = Classe::select('id', 'nom')->get();
    
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

      $paiments = PaiementParent::where('parent_id', $parent->id);
      $paiments = $this->updatedSelectedRange($paiments);
      $paiments = $paiments->sum('montant');

      $parent->setAttribute('paiements_sum', $paiments)->setAttribute('solde', $solde);

      return $parent;

    });

    return view('livewire.parents-dettes', [
      'parents' => $parents,
    ]);
  }
}
