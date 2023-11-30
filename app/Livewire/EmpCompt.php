<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Emp;
use App\Models\EmpHon;
use App\Models\EmpSal;
use Livewire\Component;
use App\Models\EmpRemise;

class EmpCompt extends Component
{
    public $hons;
    public $paiements; 
    public $remises;
    public $compts;

    public $day1;
    public $day2;
    public $date;
    public $ids;

    public $all,$t_month,$p_month,$t_week;
    
    protected $listeners = ['refresh' => 'render',];
     
    public function mount()
    {
      $this->all = 0;
      $this->t_month = 1;
      $this->p_month = 0;
      $this->t_week = 0;

        $now = Carbon::now();
        $from = "2015-1-1" ;
        $to = $now->format('Y-m-d') ;
        $this->date =[$from, $to];
    }


      public function thisMonth()
      {
        $this->all = 0;
        $this->t_month = 1;
        $this->p_month = 0;
        $this->t_week = 0;

        
        $now = Carbon::now();
        $from = $now->startOfMonth()->format('Y-m-d') ;
        $to = $now->endOfMonth()->format('Y-m-d') ;
        $this->date =[$from, $to];
        $this->reset(['day1','day2',]);

      }

      public function thisWeek()
      {
        $this->all = 0;
        $this->t_month = 0;
        $this->p_month = 0;
        $this->t_week = 1;

        $now = Carbon::now();
        $from = $now->startOfWeek()->format('Y-m-d') ;
        $to = $now->endOfWeek()->format('Y-m-d') ;
        $this->date =[$from, $to];
        $this->reset(['day1','day2',]);

      }

      public function alls()
      {
        $this->all = 1;
        $this->t_month = 0;
        $this->p_month = 0;
        $this->t_week = 0;

        $now = Carbon::now();
        $from = "2015-1-1" ;
        $to = $now->format('Y-m-d') ;
        $this->date =[$from, $to];
        $this->reset(['day1','day2',]);

      }

      public function randday()
      {
        $this->all = 0;
        $this->t_month = 0;
        $this->p_month = 0;
        $this->t_week = 0;

        $from = Carbon::parse($this->day1)->format('Y-m-d');
        $to = Carbon::parse($this->day2)->format('Y-m-d');
        $this->date =[$from, $to];

      }

      public function pastMonth()
      {
        $this->all = 0;
        $this->t_month = 0;
        $this->p_month = 1;
        $this->t_week = 0;

        $now = Carbon::now();
        $from = $now->startOfMonth()->subMonth()->format('Y-m-d') ;
        $to = $now->endOfMonth()->format('Y-m-d') ;
        $this->date =[$from, $to];
        $this->reset(['day1','day2',]);

      }



    public function render()
    {

        $this->hons = EmpHon::where('emp_id',$this->ids)->whereBetween('date',  $this->date )->sum('montant') ?? 0;
        $this->paiements = EmpSal::where('emp_id',$this->ids)->whereBetween('date',  $this->date )->sum('montant') ?? 0;
        $this->remises = EmpRemise::where('emp_id',$this->ids)->whereBetween('date',  $this->date )->sum('montant') ?? 0;
        $nonbonis = EmpSal::where('emp_id',$this->ids)->whereNot('motif',3)->whereBetween('date',  $this->date )->sum('montant') ?? 0;

        $this->compts =   $this->hons - $this->remises - $nonbonis ?? 0;

        return view('livewire.emp-compt');
    }
}
