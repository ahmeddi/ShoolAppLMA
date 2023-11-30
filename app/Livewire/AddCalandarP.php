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

class AddCalandarP extends Component
{
    public $visible = false;
    public $day=0,$time=0;

    #[Rule('required')] 
    public $mat1,$clas;

    public $prof1;


    public $WEEK_DAYS,$Times;
    public $Mats,$Profs;
    public $cnom,$Classes;


    #[On('refresh')] 
    public function mount()
    {
        $this->cnom =   Prof::find($this->prof1);



        $this->Mats = Mat::all(['id', 'nom']);
        $this->Classes = Classe::all(['id', 'nom']);



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
    

                       $this->Times = [
            '1' => '8:00 - 9:00',
            '2' => '9:00 - 10:00',
            '3' => '10:00 - 11:00',
            '4' => '11:00 - 12:00',
            '5' => '12:00 - 13:00',
            '6' => '13:00 - 14:00',
            '7' => '14:00 - 15:00',

        ];
    }




    #[On('open')] 
    public function open($id1, $id2) 
    {

        $this->resetErrorBag();
        $this->resetValidation();

     $this->day = $id1;
     $this->time = $id2;

     $lesson = Lesson::where('time', $this->time)
                        ->where('day', $this->day)
                        ->where('prof_id', $this->prof1)
                        ->first();

        if($lesson)
        {
            $this->mat1 = $lesson->mat_id; 
            $this->clas = $lesson->class_id;
        }
        else
        {
             $this->reset('clas','mat1');                  
        }

        $this->visible = true;
    }





    public function save()
    {
        $this->resetErrorBag();
        $this->resetValidation();

        $this->validate();



        $lesson = Lesson::where('class_id',$this->clas)
        ->where('time', $this->time)
        ->where('day',$this->day)
        ->whereNot('prof_id',$this->prof1)
        ->first();
 
        $lessonupdate = Lesson::where('prof_id',$this->prof1)
        ->where('time', $this->time)
        ->where('day',$this->day)
        ->first();
 
        if ($lesson !== null) {


         if (app()->getLocale() == 'ar') {
            $msg = "توجد حصة في القسم في هاذا التوقيت";
         } else {
            $msg = "Il y a un cours dans la classe à cette heure";
         }
         $this->addError('ex', $msg);
         return;
 
        }
 
        elseif ($lessonupdate) {
 
         $lessonupdate->prof_id   = $this->prof1;
         $lessonupdate->mat_id  = $this->mat1;
         $lessonupdate->class_id  = $this->clas;
         $lessonupdate->time = $this->time;
         $lessonupdate->day = $this->day;
         $lessonupdate->save(); 
 
         $this->dispatch('refresh');
 
         $this->visible = false;
 
         }
        elseif ($lesson == null) {
 
         Lesson::create([
             'class_id'   => $this->clas,
             'mat_id'  => $this->mat1,
             'prof_id'  => $this->prof1,
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
        return view('livewire.add-calandar-p');
    }
}
