<?php

namespace App\Livewire;

use App\Models\EmpHon;
use App\Models\ProfHon;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class EmpHonsEdit extends Component
{
    public $visible = false;

    public $ids;

    public $hid;

    public $Months=[],$years=[];  


    
    #[Rule('required',as: ' ')]
    public $date,$year,$month;

    
    #[Rule('required|numeric', as:' ')] 
    public $montant;


    #[On('edit')]
    public function open($id) {

        $this->resetErrorBag();
        $this->resetValidation();

        $hon = EmpHon::find($id);

        $this->montant = $hon->montant;
        $this->date = $hon->date;
        $this->year = $hon->annee;
        $this->month = $hon->mois;

        $this->hid = $id;



   
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


        EmpHon::find($this->hid)->update([
            'montant' => $this->montant,
            'date' => $this->date,
            'annee' => $this->year,
            'mois' => $this->month,
        ]);


            $this->visible = false;

            $this->dispatch('refresh');


    }

    #[Js]
    public function close()
    {
        return <<<'JS'
            $wire.visible = false;
        JS;
    }

    
    public function render()
    {
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


        return view('livewire.emp-hons-edit');
    }
}
