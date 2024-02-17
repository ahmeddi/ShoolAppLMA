<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Enums\Dates;
use App\Models\Prof;
use App\Models\Attandp;
use App\Models\ProfHon;
use Livewire\Component;
use App\Traits\Rangables;
use App\Models\ProfRemise;
use App\Models\ProfPaiement;

class ProfCompt extends Component
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

        $hons = ProfHon::where('prof_id',$this->ids);
        $hons = $this->updatedSelectedRange($hons);
        $hons = $hons->sum('montant');

        $paiements = ProfPaiement::where('prof_id',$this->ids);
        $paiements = $this->updatedSelectedRange($paiements);
        $paiements = $paiements->sum('montant');


        $remises = ProfRemise::where('prof_id',$this->ids);
        $remises = $this->updatedSelectedRange($remises);
        $remises = $remises->sum('montant');

        $nonbonis = ProfPaiement::where('prof_id',$this->ids)->whereNot('motif',3);
        $nonbonis = $this->updatedSelectedRange($nonbonis);
        $nonbonis = $nonbonis->sum('montant');

        $compts = $hons - $remises - $nonbonis ?? 0;


/*
        $attds = Attandp::where('prof_id',$this->ids)
        ->whereBetween('date',$this->date)
        ->sum('nbh');

        $saleur = Prof::find($this->ids);

        $this->hons = ProfHon::where('prof_id',$this->ids)->whereBetween('date',  $this->date )->sum('montant') ?? 0;
        $this->paiements = ProfPaiement::where('prof_id',$this->ids)->whereBetween('date',  $this->date )->sum('montant') ?? 0;
        $this->remises = ProfRemise::where('prof_id',$this->ids)->whereBetween('date',  $this->date )->sum('montant') ?? 0;
        $nonbonis = ProfPaiement::where('prof_id',$this->ids)->whereNot('motif',3)->whereBetween('date',  $this->date )->sum('montant') ?? 0;

        $this->compts =   $this->hons - $this->remises - $nonbonis ?? 0;
*/
        
        return view('livewire.prof-compt', ['hons' => $hons, 'paiements' => $paiements, 'remises' => $remises, 'compts' => $compts]);
    }
}
