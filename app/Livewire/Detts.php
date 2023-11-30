<?php

namespace App\Livewire;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\DetteEch;
use Livewire\Attributes\On;

class Detts extends Component
{
    

    public $day1;
    public $day2;
    public $date;

    public $t_month = false;
    public $p_month = false;
    public $t_week = false;
    public $n_month = false;

    public $all = false;
    
     
    public function mount()
    {
        $this->thisMonth();
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
        $this->n_month = false;


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
        $this->n_month = false;


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
        $this->n_month = false;


      }

      public function pastMonth()
      {
        $now = Carbon::now();
        $from = $now->startOfMonth()->subMonth()->format('Y-m-d') ;
        $to = $now->endOfMonth()->format('Y-m-d') ;



        $this->date =[$from, $to];
        $this->reset(['day1','day2',]);


        $this->t_month = false;
        $this->p_month = true;
        $this->all = false;
        $this->t_week = false;
        $this->n_month = false;


      }

      public function nextMonth()
      {        
        $from =  Carbon::now()->addMonth()->startOfMonth();
        $to =    Carbon::now()->addMonth()->endOfMonth();
        
        $this->date =[$from->format('Y-m-d'), $to->format('Y-m-d')];

        $this->reset(['day1','day2',]);


        $this->t_month = false;
        $this->p_month = false;
        $this->all = false;
        $this->t_week = false;
        $this->n_month = true;


      }

      public function alls()
      {
          $now = Carbon::now();
          $from = Carbon::parse('1-1-2000')->format('Y-m-d') ;
          $to = $now->addYear()->format('Y-m-d') ;
          $this->date =[$from, $to];
  
          $this->t_month = false;
          $this->p_month = false;
          $this->all = true;
          $this->t_week = false;
          $this->n_month = false;

      }

      #[On('delete')]
      function delete($idkey)  
      {
        DetteEch::find($idkey)->delete();
          $this->mount();
  
      }


      

    #[On('refresh')]
    public function render()
    {
        $detts = DetteEch::with('entreprise')->whereBetween('date',  $this->date)->get();

        return view('livewire.detts',['detts' => $detts,]);
    }
}
