<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\EmpSal;
use Livewire\Component;
use App\Models\ProfPaiement;

class Salaires extends Component
{

    public $date;
    public $salaries;

    public $day1, $day2;

    public $t_month;
    public $p_month;
    public $all;

    public $filter = '*';







   public function mount()
   {
      



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

        


      }



      public function randday()
      {
        $from = Carbon::parse($this->day1)->format('Y-m-d');
        $to = Carbon::parse($this->day2)->format('Y-m-d');


        $this->date =[$from, $to];

        $this->t_month = false;
        $this->p_month = false;
        $this->all = false;

        


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

          

      }


    public function render()
    {
        $profSalaries = ProfPaiement::with('prof')->whereBetween('date', $this->date)->get();
        $empSalaries = EmpSal::with('emp')->whereBetween('date', $this->date)->get();

        // Create a custom collection with the desired structure
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


        if ($this->filter !== '*') {
            $salariesCollection = $salariesCollection->where('type', $this->filter);
        }

        $this->salaries = $salariesCollection;

        

       // dd($this->salaries);

        return view('livewire.salaires');
    }
}
