<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Enums\Dates;
use App\Models\Attande;
use Livewire\Component;
use App\Models\Attandep;
use App\Traits\Rangables;
use Livewire\Attributes\On;

class EmpAttList extends Component
{

    public $emp;

    use Rangables;

    public $tot;



         
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
      function delete($key)  
      {
          Attandep::find($key)->delete();
          $this->mount();
  
      }


    #[On('refresh')]
    public function render()
    {

        $this->table_col_id =  'all';
        $this->table_col_date = 'date';

        $attds = Attandep::where('emp_id', $this->emp->id);
        $attds = $this->updatedSelectedRange($attds);
        $attds = $attds->get();



        $this->tot = $attds->sum('nbh');


        return view('livewire.emp-att-list', ['hours' => $attds]);
    }
}
