<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Enums\Dates;
use App\Models\EmpSal;
use Livewire\Component;
use App\Traits\Rangables;
use Livewire\Attributes\On;

class EmpPaiements extends Component
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
        EmpSal::find($idkey)->delete();
          $this->mount();
  
      }

      

    #[On('refresh')] 
    public function render()
    {

      $this->table_col_id =  'all';
      $this->table_col_date = 'date';

      $paiements = EmpSal::where('emp_id',$this->ids);
      $paiements = $this->updatedSelectedRange($paiements);
      $paiements = $paiements->get();

        return view('livewire.emp-paiements',['paiements' => $paiements,]);
    }
}
