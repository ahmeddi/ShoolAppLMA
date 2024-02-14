<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Emp;
use App\Enums\Dates;
use Livewire\Component;
use App\Models\Attandep;
use App\Traits\Rangables;
use Livewire\Attributes\On;

class AttndsEmps extends Component
{
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

    $attds = Attandep::where('nbh' ,'>' ,0);

    $attds = $this->updatedSelectedRange($attds);
  
    $attds =  $attds->get()->map(function ($row){
      $prof_id = $row->first()->emp_id;
      $prof_nom = Emp::find($prof_id)->nom;
      $nomfr = Emp::find($prof_id)->nomfr;
      return ['id' => $prof_id, 'nom' => $prof_nom, 'nomfr' => $nomfr,  'nbp' => $row->nbh];} )
   ;

        return view('livewire.attnds-emps',['attds' => $attds]);
    }
}
