<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Enums\Dates;
use App\Models\Parentt;
use Livewire\Component;
use App\Models\Fraisetud;
use App\Traits\Rangables;
use Livewire\Attributes\On;

class ParentFrais extends Component
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
        Fraisetud::find($idkey)->delete();
          $this->mount();
  
      }

      

    #[On('refresh')] 
    public function render()
    {

        $this->table_col_id =  'all';
        $this->table_col_date = 'date';

        $frais = Fraisetud::where('parent_id',$this->ids);
        $frais = $this->updatedSelectedRange($frais);
        $frais = $frais->get();

        return view('livewire.parent-frais',['frais' => $frais]);
    }
}
