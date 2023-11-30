<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Mat;
use App\Models\Prof;
use App\Models\Classe;
use App\Models\Attandp;
use Livewire\Component;
use App\Models\ProfClass;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class ProfsAttListAdd extends Component
{
    public $visible = false;

    public $prof1;


    #[Rule('required',as: ' ')] 
    public $date,$nbh,$mat,$classe;

    public $Mats=[];
    public $Classes=[];

    #[On('pattl')]
    public function open() 
    {      
        $this->resetErrorBag();
        $this->resetValidation();

        $this->resetExcept('prof1');


        $this->date = Carbon::today()->format('Y-m-d') ;


        $this->Mats = Mat::all('id','nom');
        $this->Classes = Classe::all('id','nom');
        


        $this->visible = true;
    }



    public function save()
    {

      $prof = Prof::find($this->prof1);


      $cond =   ProfClass::where('prof_id',$this->prof1)
                            ->where('mat_id',$this->mat)
                            ->where('classe_id',$this->classe)
                            ->get()->count();

        $errmagar = 'الاستاذ لا يدرس هذه المادة لهاذا القسم';
        $errmagfr = 'L\'enseignant n\'enseigne pas cette matière pour cette classe';
        $errmsg = app()->getLocale() == 'ar' ? $errmagar : $errmagfr;

        
        $this->resetErrorBag();
        $this->resetValidation();

       $this->validate();


       if ($cond == 0 && ($prof->ts == 2 || $prof->ts == 3)) 
       {
        $this->addError('classe', $errmsg);

        return ;
         }

      $msgar = 'يوجد سجل لهذا اليوم';
      $msgfr = 'Il y a un enregistrement pour ce jour';
      $msg = app()->getLocale() == 'ar' ? $msgar : $msgfr;

       if (Attandp::where('date',$this->date)
                  ->where('prof_id',$this->prof1)
                  ->where('mat_id',$this->mat)
                  ->where('classe_id',$this->classe)
                  ->count()) {
            $this->addError('date', $msg);
            return ;
       } else {
        
        Attandp::create([
            'prof_id'   => $this->prof1,
            'nbh'  => $this->nbh,
            'mat_id' => $this->mat,
            'classe_id' => $this->classe,
            'date' => $this->date,
          ]);

          
    $this->dispatch('refresh');
    $this->resetExcept('prof1');
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
        return view('livewire.profs-att-list-add');
    }
}
