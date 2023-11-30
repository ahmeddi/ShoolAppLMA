<?php

namespace App\Livewire;

use App\Models\Mat;
use App\Models\Prof;
use App\Models\Time;
use App\Models\Classe;
use Livewire\Component;
use App\Models\SoirJorn;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class CalandarSoirAdd extends Component
{
    public $visible = false;
    public $day=0,$time=[];

    #[Rule('required')] 
    public $mat1,$prof1;


    public $WEEK_DAYS,$Times;
    public $Mats,$Profs;
    public $clas,$cnom;


    #[On('refresh')] 
    public function mount()
    {

        $this->cnom =   Classe::find($this->clas);

        $this->Mats = Mat::all(['id', 'nom']);
        $this->Profs = Prof::all(['id', 'nom']);


        $joursSemaineArabe  = [
            '1' => 'الاثنين',
            '2' => 'الثلاثاء',
            '3' => 'الأربعاء',
            '4' => 'الخميس',
            '5' => 'الجمعة',
            '6' => 'السبت',
            '7' => 'الأحد',
        ];
    
        $joursSemaineFrancais  = [
            '1' => 'Lundi',
            '2' => 'Mardi',
            '3' => 'Mercredi',
            '4' => 'Jeudi',
            '5' => 'Vendredi',
            '6' => 'Samedi',
            '7' => 'Dimanche',
        ];
    
        $this->WEEK_DAYS = (app()->getLocale() == 'ar') ? $joursSemaineArabe : $joursSemaineFrancais;
    


    }




    #[On('open')] 
    public function open($id1, $id2) 
    {


     $this->day = $id1;
     $this->time =Time::find($id2);


     $lesson = SoirJorn::where('time_id', $this->time->id)
     ->where('day', $this->day)
     ->where('class_id', $this->clas)
     ->first();

        if($lesson)
        {
            $this->mat1 = $lesson->mat_id; 
            $this->prof1 = $lesson->prof_id;
        }
        else
        {
            $this->reset('prof1','mat1');                  
        }

        $this->visible = true;
    }





    public function save()
    {
        $this->resetErrorBag();
        $this->resetValidation();


        $time = $this->time['id'];

        $this->validate();

        $coursExistAvecClasse = SoirJorn::where('class_id', $this->clas)
            ->where('time_id', $time)
            ->where('day', $this->day)
            ->first();

         if ($coursExistAvecClasse) 
         {
            $coursExistAvecClasse->prof_id = $this->prof1;
            $coursExistAvecClasse->mat_id = $this->mat1;
            $coursExistAvecClasse->time_id = $time;
            $coursExistAvecClasse->day = $this->day;
            $coursExistAvecClasse->save();

        } else 
        {
            SoirJorn::create([
                'prof_id' => $this->prof1,
                'mat_id' => $this->mat1,
                'class_id' => $this->clas,
                'time_id' => $time,
                'day' => $this->day,
            ]);
        }

        $this->dispatch('refresh');
        $this->visible = false;

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
        return view('livewire.calandar-soir-add');
    }
}
