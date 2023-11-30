<?php

namespace App\Livewire;

use App\Models\Parentt;
use Livewire\Component;
use App\Models\Fraisetud;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class ParentFraisEdit extends Component
{
    public $visible = false;

    public $ids;

    public $fds;


    public $lists=[],$Months=[],$years=[];  

    public $etuds=[];  

    

    
    #[Rule('required',as: ' ')]
    public $date,$motif,$etud;

    
    #[Rule('required|numeric', as:' ')] 
    public $montant;


    #[Rule('required_if:motif,2',as:'')]
    public $year,$month;

    #[On('edit')]
    public function open($id) 
    {

        $this->resetErrorBag();
        $this->resetValidation();

        $frais = Fraisetud::find($id);

        $this->fds = $frais->id;
        $this->montant = $frais->montant;
        $this->date = $frais->date;
        $this->motif = $frais->motif;
        $this->etud = $frais->etudiant_id;
        ;

        $this->year = $frais->annee;
        $this->month = $frais->mois;

           
        $this->visible = true;

    }

    public function save()
    {
        if($this->montant) {
            $this->montant = Str::replace(' ', '', $this->montant);
        }
        
         $this->resetErrorBag();
         $this->resetValidation();

        $this->validate();

        $frais = Fraisetud::find($this->fds);

        $frais->update([
            'montant' => $this->montant,
            'date' => $this->date,
            'motif' => $this->motif,
            'etudiant_id' => $this->etud,
            'annee' => $this->year,
            'mois' => $this->month,
        ]);

        $this->visible = false;



        $this->dispatch('refresh');

    }











    
    public function render()
    {
        $this->etuds = Parentt::find($this->ids)->etuds;


        if (app()->getLocale() == 'ar') 
        {
            $this->Months = [
                1 => 'يناير',
                2 => 'فبراير',
                3 => 'مارس',
                4 => 'ابريل',
                5 => 'مايو',
                6 => 'يونيو',
                7 => 'يوليو',
                8 => 'اغسطس',
                9 => 'سبتمبر',
                10 => 'اكتوبر',
                11 => 'نوفمبر',
                12 => 'ديسمبر',
            ];
        } 
        else 
        {
            $this->Months = [
                1 => 'Janvier',
                2 => 'Février',
                3 => 'Mars',
                4 => 'Avril',
                5 => 'Mai',
                6 => 'Juin',
                7 => 'Juillet',
                8 => 'Août',
                9 => 'Septembre',
                10 => 'Octobre',
                11 => 'Novembre',
                12 => 'Décembre',
            ];
        }


        $this->years = [
              intval(now()->year)  -1,
              intval(now()->year),
              intval(now()->year)  +1,
              intval(now()->year)  +2,

        ];

        $this->year = intval(now()->format('Y')) ;
        $this->month = intval(now()->format('m')) ;
        $this->date = today()->format('Y-m-d') ;

        
        return view('livewire.parent-frais-edit');
    }
}
