<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Enums\Dates;
use App\Models\Dette;
use Livewire\Component;
use App\Livewire\Dettes;
use App\Traits\Rangables;
use Livewire\Attributes\On;

class DettesPres extends Component
{

     public $ids;

     public $tots;

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
        
        $detts = Dette::where('id','!=',null);

        $detts = $this->updatedSelectedRange($detts);
        $detts = $this->applySorting($detts, true);

        $detts = $detts->get();

        $this->tots = $detts->sum('montant');

        return view('livewire.dettes-pres',['detts'=>$detts]);
    }
}
