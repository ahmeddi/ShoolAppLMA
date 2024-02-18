<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Enums\Dates;
use App\Models\EmpSal;
use Livewire\Component;
use App\Traits\Rangables;
use App\Models\ProfPaiement;
use Livewire\Attributes\Url;

class Salaires extends Component
{

    public $date;

    public $tots;

    use Rangables;

   

    #[Url]
    public $filter_sal = '*';

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
    }


    public function render()
    { 
      
      $this->table_col_id =  'all';
      $this->table_col_date = 'date';
        
        if ($this->filter_sal == 1 ) {
          $profSalaries = ProfPaiement::with('prof');
          $profSalaries = $this->updatedSelectedRange($profSalaries);
          $profSalaries = $this->applySorting($profSalaries, true);
          $profSalaries = $profSalaries->get();

          $this->tots = $profSalaries->sum('montant');

          $salariesCollection = collect([]);

          foreach ($profSalaries as $profSalary) {
              $salariesCollection->push([
                  'id' => $profSalary->prof->id, 
                  'nom' => $profSalary->prof->nom,
                  'nomfr' => $profSalary->prof->nomfr,
                  'type' => 1,
                  'motif' => $profSalary->motif,
                  'montant' => $profSalary->montant,
                  'date' => $profSalary->date,
              ]);
          }

          
        }
        else if ($this->filter_sal == 2) {
            
          $empSalaries = EmpSal::with('emp');
          $empSalaries = $this->updatedSelectedRange($empSalaries);
          $empSalaries = $this->applySorting($empSalaries, true);
          $empSalaries = $empSalaries->get();

          $this->tots = $empSalaries->sum('montant');

          $salariesCollection = collect([]);

          foreach ($empSalaries as $empSalary) {
            $salariesCollection->push([
                'id' => $empSalary->emp->id,
                'nom' =>  $empSalary->emp->nom, 
                'nomfr' =>  $empSalary->emp->nomfr, 
                'type' => 0,
                'motif' => $empSalary->motif,
                'montant' => $empSalary->montant,
                'date' => $empSalary->date,
            ]);
        }
        }
        else if ($this->filter_sal == '*'){
          $profSalaries = ProfPaiement::with('prof');
          $profSalaries = $this->updatedSelectedRange($profSalaries);
          $profSalaries = $profSalaries->get();

          $empSalaries = EmpSal::with('emp');
          $empSalaries = $this->updatedSelectedRange($empSalaries);
          $empSalaries = $empSalaries->get();

          $salariesCollection = collect([]);

          foreach ($profSalaries as $profSalary) {
              $salariesCollection->push([
                  'id' => $profSalary->prof->id, 
                  'nom' => $profSalary->prof->nom,
                  'nomfr' => $profSalary->prof->nomfr,
                  'type' => 1,
                  'motif' => $profSalary->motif,
                  'montant' => $profSalary->montant,
                  'date' => $profSalary->date,
              ]);
          }

          foreach ($empSalaries as $empSalary) {
              $salariesCollection->push([
                  'id' => $empSalary->emp->id,
                  'nom' =>  $empSalary->emp->nom, 
                  'nomfr' =>  $empSalary->emp->nomfr, 
                  'type' => 0,
                  'motif' => $empSalary->motif,
                  'montant' => $empSalary->montant,
                  'date' => $empSalary->date,
              ]);
          }

              $salariesCollection = $salariesCollection->sortByDesc('date');         
              $salariesCollection = $this->applySorting($salariesCollection, false);
              $salariesCollection = $salariesCollection->values()->all();
              


          $this->tots = $profSalaries->sum('montant') + $empSalaries->sum('montant');

          
        }

        return view('livewire.salaires',['salaries'=>$salariesCollection]);
    }
}
