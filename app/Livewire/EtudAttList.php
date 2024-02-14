<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Enums\Dates;
use App\Models\Attande;
use Livewire\Component;
use App\Traits\Rangables;
use Livewire\Attributes\On;

class EtudAttList extends Component
{
  use Rangables;

  public $etud;
  public $ids;

    
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

        $this->ids = $this->etud->id;
    }
   

      #[On('delete')]
      function delete($key)  
      {
          Attande::find($key)->delete();
          $this->mount();
  
      }


    #[On('refresh')]
    public function render()
    {
      $this->table_col_id =  'etudiant_id';
      $this->table_col_date = 'date';
  
      $attds = Attande::where('nbh' ,'>' ,0)
                             ->orderBy('date', 'desc');
  
      $attds = $this->updatedSelectedRange($attds);
    
      $attds =  $attds->get();


        return view('livewire.etud-att-list',['hours' => $attds]);
    }
}
