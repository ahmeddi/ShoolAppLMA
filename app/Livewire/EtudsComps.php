<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Attande;
use Livewire\Component;
use App\Models\Etudiant;
use Livewire\Attributes\On;

class EtudsComps extends Component
{
    public $day1;
    public $day2;
    public $date;
    public $ids;

    public $frais;
    public $salaires =0;
    public $deductions =0;
    public $compts  =0;

    public $paiements ;
    public $remises;


    public $t_month = false;
    public $p_month = false;
    public $t_week = false;

    public $all = false;

         
    public function mount()
    {
        $now = Carbon::now();
        $from = $now->startOfMonth()->format('Y-m-d') ;
        $to = $now->endOfMonth()->format('Y-m-d') ;
        $this->date =[$from, $to];

        $this->t_month = true;
        $this->p_month = false;
        $this->all = false;
        $this->t_week = false;
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

      }

      #[On('delete')]
      function delete($key)  
      {
          Attande::find($key)->delete();
          $this->mount();
  
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
      }


    #[On('refresh')]
    public function render()
    {
        /*
        $this->reccets = Cotisationset::where('etudiant_id',$this->ids)->whereBetween('date',  $this->date )->sum('montant') ?? 0;
        $this->salaires = Salaireet::where('etudiant_id',$this->ids)->whereBetween('date',  $this->date )->sum('montant') ?? 0;
        $this->deductions = Deductionet::where('etudiant_id',$this->ids)->whereBetween('date',  $this->date )->sum('montant') ?? 0;

        $this->compts = $this->salaires + $this->deductions- $this->reccets ?? 0;
        */
        $etud = Etudiant::find($this->ids);

        $this->frais =  $etud->frais->whereBetween('date',  $this->date )->sum('montant') ?? 0;
    //    $this->paiements =  $etud->paiements->whereBetween('date',  $this->date )->sum('montant') ?? 0;
    //    $this->remises =  $etud->remises->whereBetween('date',  $this->date )->sum('montant') ?? 0;

    //    $this->compts = $this->paiements - $this->frais - $this->remises ?? 0;


        return view('livewire.etuds-comps');
    }

    
}
