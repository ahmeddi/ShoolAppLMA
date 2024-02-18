<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Emp;
use App\Enums\Dates;
use App\Models\EmpHon;
use App\Models\EmpSal;
use Livewire\Component;
use App\Models\EmpRemise;
use App\Traits\Rangables;

class EmpCompt extends Component
{
   
    public $ids;

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





    public function render()
    {
      $this->table_col_id =  'all';
      $this->table_col_date = 'date';

      $hons= EmpHon::where('emp_id',$this->ids);
      $hons = $this->updatedSelectedRange($hons);
      $hons = $hons->sum('montant');

      $paiements = EmpSal::where('emp_id',$this->ids);
      $paiements = $this->updatedSelectedRange($paiements);
      $paiements = $paiements->sum('montant');

      $remises = EmpRemise::where('emp_id',$this->ids);
      $remises = $this->updatedSelectedRange($remises);
      $remises = $remises->sum('montant');

      $nonbonis = EmpSal::where('emp_id',$this->ids)->whereNot('motif',3);
      $nonbonis = $this->updatedSelectedRange($nonbonis);
      $nonbonis = $nonbonis->sum('montant');

      $compts =   $hons - $remises - $nonbonis ?? 0;

     

        return view('livewire.emp-compt', ['hons' => $hons, 'paiements' => $paiements, 'remises' => $remises, 'compts' => $compts]);
    }
}
