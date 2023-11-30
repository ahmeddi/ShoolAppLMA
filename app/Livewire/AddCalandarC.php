<?php

namespace App\Livewire;

use App\Models\Mat;
use App\Models\Prof;
use App\Models\Classe;
use App\Models\Lesson;
use Livewire\Component;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class AddCalandarC extends Component
{
    public $visible = false;
    public $day=0,$time=0;

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
        //    '7' => 'الأحد',
        ];
    
        $joursSemaineFrancais  = [
            '1' => 'Lundi',
            '2' => 'Mardi',
            '3' => 'Mercredi',
            '4' => 'Jeudi',
            '5' => 'Vendredi',
            '6' => 'Samedi',
          //  '7' => 'Dimanche',
        ];
    
        $this->WEEK_DAYS = (app()->getLocale() == 'ar') ? $joursSemaineArabe : $joursSemaineFrancais;
    
/*
                $this->Times = [
            '1' => '8:00 - 9:00',
            '2' => '9:00 - 10:00',
            '3' => '10:00 - 11:00',
            '4' => '11:00 - 12:00',
            '5' => '12:00 - 13:00',
            '6' => '13:00 - 14:00',
            '7' => '14:00 - 15:00',
            
            

        ];
        */
        
        $this->Times = Classe::with('times')->find($this->clas)->times->pluck('time','id');

    }




    #[On('open')] 
    public function open($id1, $id2) 
    {

     $this->day = $id1;
     $this->time = $id2;

     $lesson = Lesson::where('time', $this->time)
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

        $this->validate();

        $coursExistAvecProf = Lesson::where('prof_id', $this->prof1)
            ->where('time', $this->time)
            ->where('day', $this->day)
            ->whereNot('class_id', $this->clas)
            ->first();

        $coursExistAvecClasse = Lesson::where('class_id', $this->clas)
            ->where('time', $this->time)
            ->where('day', $this->day)
            ->first();

        if ($coursExistAvecProf !== null) {
            $classe = Classe::find($coursExistAvecProf->class_id);
            $jourSemaine = $this->WEEK_DAYS[$coursExistAvecProf->day + 1];
            $horaire = $this->Times[$coursExistAvecProf->time + 1];
            $nomClasse = $classe->nom;
            $msg = "a déjà un cours";
            $message = "$msg $jourSemaine à $horaire dans la classe $nomClasse";

            if (app()->getLocale() == 'ar') {
                $message = " لديه حصة $jourSemaine   $horaire في قسم  $nomClasse";
            }

            $this->addError('ex', $message);

        } elseif ($coursExistAvecClasse) {
            $coursExistAvecClasse->prof_id = $this->prof1;
            $coursExistAvecClasse->mat_id = $this->mat1;
            $coursExistAvecClasse->time = $this->time;
            $coursExistAvecClasse->day = $this->day;
            $coursExistAvecClasse->save();

            $this->dispatch('refresh');
            $this->visible = false;

        } else {
            Lesson::create([
                'prof_id' => $this->prof1,
                'mat_id' => $this->mat1,
                'class_id' => $this->clas,
                'time' => $this->time,
                'day' => $this->day,
            ]);

            $this->dispatch('refresh');
            $this->visible = false;
            
        }
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
        return view('livewire.add-calandar-c');
    }
}
