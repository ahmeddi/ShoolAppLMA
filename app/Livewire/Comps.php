<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Enums\Dates;
use App\Models\Note;
use App\Models\Dette;
use App\Models\EmpHon;
use App\Models\EmpSal;
use App\Models\Depance;
use App\Models\ProfHon;
use Livewire\Component;
use App\Models\DetteEch;
use App\Models\Etudiant;
use App\Models\Fraisetud;
use App\Traits\Rangables;
use App\Models\RemisParent;
use Livewire\Attributes\On;
use App\Models\ProfPaiement;
use App\Models\DettePaiement;
use App\Models\PaiementParent;
use App\Livewire\ParentPaiements;
use App\Console\Commands\ProfSalaire;

class Comps extends Component
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

        $this->selectedRange = 'month';

        $this->rangeName =  __('calandar.month');

    }
    
     




    #[On('refresh')]
    public function render()
    {

      /*
        $frais = Fraisetud::whereBetween('date', $this->date)->sum('montant');
        $payed = PaiementParent::whereBetween('date', $this->date)->sum('montant');

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

*/
        $this->table_col_id =  'all';
        $this->table_col_date = 'date';

        $frais = Fraisetud::orderBy('date', 'desc');
        $payed = PaiementParent::orderBy('date', 'desc');

        $peis = DettePaiement::orderBy('date', 'desc');
        $dettes = Dette::orderBy('date', 'desc');
        $dette = DetteEch::orderBy('date', 'desc');

        $prof_hon = ProfHon::orderBy('date', 'desc');
        $prof_sal = ProfPaiement::orderBy('date', 'desc');

        $emp_hon = EmpHon::orderBy('date', 'desc');
        $emp_sal = EmpSal::orderBy('date', 'desc');

        $depances = Depance::orderBy('date', 'desc');

        $frais = $this->updatedSelectedRange($frais);
        $payed = $this->updatedSelectedRange($payed);
        $peis = $this->updatedSelectedRange($peis);
        $dettes = $this->updatedSelectedRange($dettes);
        $dette = $this->updatedSelectedRange($dette);

        $prof_hon = $this->updatedSelectedRange($prof_hon);
        $prof_sal = $this->updatedSelectedRange($prof_sal);

        $emp_hon = $this->updatedSelectedRange($emp_hon);
        $emp_sal = $this->updatedSelectedRange($emp_sal);

        $depances = $this->updatedSelectedRange($depances);

        $frais =  $frais->sum('montant');
        $payed =  $payed->sum('montant');
        $peis =  $peis->sum('montant');
        $dettes =  $dettes->sum('montant');
        $dette =  $dette->sum('montant');
        $prof_hon =  $prof_hon->sum('montant');
        $prof_sal =  $prof_sal->sum('montant');
        $emp_hon =  $emp_hon->sum('montant');
        $emp_sal =  $emp_sal->sum('montant');
        $depances =  $depances->sum('montant');

        $sal = $prof_sal + $emp_sal;
        $hon = $prof_hon + $emp_hon;

        $recet = $payed;


        $comps = $recet + $dettes - $sal - $depances - $peis;


     //   $payed = PaiementParent::whereBetween('date', $this->date)->sum('montant');


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
