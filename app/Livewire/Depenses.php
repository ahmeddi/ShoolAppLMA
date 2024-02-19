<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Enums\Dates;
use App\Models\Depance;
use Livewire\Component;
use App\Traits\Rangables;
use Livewire\Attributes\On;
use Livewire\WithPagination;

class Depenses extends Component
{
    use WithPagination;

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

      #[On('delete')]
      function delete($idkey)  
      {
        Depance::find($idkey)->delete();
          $this->mount();
  
      }


      

    #[On('refresh')]
    public function render()
    {

        $this->table_col_id =  'all';
        $this->table_col_date = 'date';
        
        $deps = Depance::where('id','!=',null);
        $deps = $this->updatedSelectedRange($deps);
        $deps = $this->applySorting($deps, true);
        $deps = $deps->get();



        return view('livewire.depenses',['deps' => $deps]);
    }
}
