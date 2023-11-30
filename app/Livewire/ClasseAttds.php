<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\AttdsClass;
use Livewire\Attributes\On;

class ClasseAttds extends Component
{
    public $day1;
    public $day2;
    public $date;

    public $t_month = false;
    public $p_month = false;
    public $t_week = false;
    public $t_day = false;
    public $p_day = false;

    public $all = false;
    
     
    public function mount()
    {
        $this->thisDay();
    }


    function thisDay() 
    {
        $now = Carbon::now();
        $from = $now->format('Y-m-d') ;
        $to = $now->format('Y-m-d') ;

        $this->date =[$from, $to];
        $this->reset(['day1','day2',]);

        $this->t_month = false;
        $this->p_month = false;
        $this->all = false;
        $this->t_week = false;
        $this->t_day = true;
        $this->p_day = false;
      
    }

    function pastDay()
    {

      $now = Carbon::now();
      $from = $now->copy()->subDay()->format('Y-m-d');
      $to = $now->copy()->subDay()->format('Y-m-d');

        $this->date =[$from, $to];
        $this->reset(['day1','day2',]);

        $this->t_month = false;
        $this->p_month = false;
        $this->all = false;
        $this->t_week = false;
        $this->t_day = false;
        $this->p_day = true;
      }




      public function thisMonth()
      {
        $now = Carbon::now();
        $from = $now->startOfMonth()->format('Y-m-d') ;
        $to = $now->endOfMonth()->format('Y-m-d') ;



        $this->date =[$from, $to];
        
        $this->reset(['day1','day2',]);

        $this->t_month = true;
        $this->p_month = false;
        $this->all = false;
        $this->t_week = false;
        $this->t_day = false;
        $this->p_day = false;

      }

      public function thisWeek()
      {
        $now = Carbon::now();
        $from = $now->startOfWeek()->format('Y-m-d') ;
        $to = $now->endOfWeek()->format('Y-m-d') ;


        $this->date =[$from, $to];
        $this->reset(['day1','day2',]);

        $this->t_month = false;
        $this->p_month = false;
        $this->all = false;
        $this->t_week = true;
        $this->t_day = false;
        $this->p_day = false;

      }

      public function randday()
      {
        $from = Carbon::parse($this->day1)->format('Y-m-d');
        $to = Carbon::parse($this->day2)->format('Y-m-d');


        $this->date =[$from, $to];

        $this->t_month = false;
        $this->p_month = false;
        $this->all = false;
        $this->t_week = false;
        $this->t_day = false;
        $this->p_day = false;

      }

      public function pastMonth()
      {
        $now = Carbon::now();
        $from = $now->copy()->subMonthNoOverflow()->startOfMonth()->format('Y-m-d');
        $to = $now->copy()->subMonthNoOverflow()->endOfMonth()->format('Y-m-d');


        $this->date = [$from, $to];

        $this->reset(['day1', 'day2']);

        $this->t_month = false;
        $this->p_month = true;
        $this->all = false;
        $this->t_week = false;
        $this->t_day = false;
        $this->p_day = false;

      }

      public function alls()
      {
          $now = Carbon::now();
          $from = Carbon::parse('1-1-2000')->format('Y-m-d') ;
          $to = $now->format('Y-m-d') ;
          $this->date =[$from, $to];
  
          $this->t_month = false;
          $this->p_month = false;
          $this->all = true;
          $this->t_week = false;
          $this->t_day = false;
        $this->p_day = false;
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
      $attds = AttdsClass::whereBetween('date', $this->date)
      ->orderBy('date', 'desc')
      ->get();


        return view('livewire.classe-attds',[
            'attds' => $attds,
        ]);
    }
}
