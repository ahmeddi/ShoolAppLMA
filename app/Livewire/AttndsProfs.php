<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Enums\Dates;
use App\Models\Attandp;
use Livewire\Component;
use App\Traits\Rangables;
use Livewire\Attributes\On;

class AttndsProfs extends Component
{
  use Rangables;

 

  public $tots = 0;


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
  


  #[On('delete')]
  function delete($idkey)
  {
    Attandp::find($idkey)->delete();
    $this->render();
  }

  #[On('refresh')]
  public function render()
  {

    $this->table_col_id =  'all';
    $this->table_col_date = 'date';

    $attds = Attandp::with('prof', 'classe', 'mat');

    $attds = $this->updatedSelectedRange($attds);
  
    $attds =  $attds->get();

    $this->tots = $attds->sum('nbh');



    return view('livewire.attnds-profs', ['attds' => $attds]);
  }
}
