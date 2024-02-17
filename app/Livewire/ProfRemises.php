<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Enums\Dates;
use Livewire\Component;
use App\Traits\Rangables;
use App\Models\ProfRemise;
use Livewire\Attributes\On;

class ProfRemises extends Component
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
        ProfRemise::find($idkey)->delete();
          $this->mount();
  
      }

      

    #[On('refresh')] 
    public function render()
    {

        $this->table_col_id =  'all';
        $this->table_col_date = 'date';

        $remises = ProfRemise::where('prof_id',$this->ids);
        $remises = $this->updatedSelectedRange($remises);
        $remises = $remises->get();


        return view('livewire.prof-remises',['remises'=>$remises]);
    }
}
