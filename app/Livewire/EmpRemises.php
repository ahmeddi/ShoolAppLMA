<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Enums\Dates;
use Livewire\Component;
use App\Models\EmpRemise;
use App\Traits\Rangables;
use Livewire\Attributes\On;

class EmpRemises extends Component
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

      $this->selectedRange = 'all';

      $this->rangeName =  __('calandar.tous');
    }



      #[On('delete')]
      function delete($idkey)  
      {
        EmpRemise::find($idkey)->delete();
          $this->mount();
  
      }

      

    #[On('refresh')] 
    public function render()
    {

        $this->table_col_id =  'all';
        $this->table_col_date = 'date';

        $remises =  EmpRemise::where('emp_id',$this->ids);
        $remises = $this->updatedSelectedRange($remises);
        $remises = $remises->get();

        return view('livewire.emp-remises',['remises'=>$remises]);
    }
}
