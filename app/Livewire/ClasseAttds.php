<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Time;
use Livewire\Component;
use App\Models\AttdsClass;
use Livewire\Attributes\On;
use App\Enums\Dates;

use App\Traits\Rangables;

class ClasseAttds extends Component
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

        $this->selectedRange = 'month';

        $this->rangeName =  __('calandar.month');
    }


    #[On('delete')]
    function delete($idkey)  
    {
        AttdsClass::find($idkey)->delete();
        $this->mount();

    }


    #[On('refresh')]
    public function render()
    {
      // $attds = AttdsClass::with('times')
      // ->whereBetween('date', $this->date)
      // ->orderBy('date', 'desc')
      // ->get();

      $Times = Time::select('id', 'time')->get()->map->only(['id', 'time']);


      $this->table_col_id =  'all';
      $this->table_col_date = 'date';
  
      $attds = AttdsClass::with('times')
                             ->orderBy('date', 'desc');
  
      $attds = $this->updatedSelectedRange($attds);
    
      $attds =  $attds->get();

        return view('livewire.classe-attds',[
            'attds' => $attds,
            'Times' => $Times,
        ]);
    }
}
