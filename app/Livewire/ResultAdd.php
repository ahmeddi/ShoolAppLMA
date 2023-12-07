<?php

namespace App\Livewire;

use App\Models\Mat;
use App\Models\Prof;
use App\Models\Classe;
use App\Models\Examen;
use Livewire\Component;
use App\Models\Semestre;
use Livewire\Attributes\Rule;
use App\Models\ProfClassesResult;

class ResultAdd extends Component
{
    public $classes =[];
    public $sems =[];
    public $exams =[];
    public $mats =[];

    #[Rule('required')]
    public $classe, $exam, $mat, $sem;


    public function mount()
    {
        $this->classes = Classe::all('nom','id');
        $this->mats = Mat::all('nom','id');
        

        $this->sems = Semestre::with('examens')->get();    

    }

    function update()  
    {
        if ($this->sem) {
            $this->exams =  Semestre::find($this->sem)->examens;

        } else {
            $this->exams = [];
        }
        


    }

    public function save()
    {


         $this->resetErrorBag();
         $this->resetValidation();

        $this->validate();


        $class =  Classe::find($this->classe);

        $msg = 'القسم لا يدرس هذه المادة';
        $msg2 = 'Le classe n\'enseigne pas cette matière';

        app()->getLocale() == 'ar' ? $msg = $msg : $msg = $msg2;

        $local = app()->getLocale();

        $profmatmsg1 = 'المادة ليست من اختصاص الأستاذ';
        $profmatmsg2 = 'La matière n\'est pas de la compétence du professeur';
        $local == 'ar' ? $profmatmsg = $profmatmsg1 : $profmatmsg = $profmatmsg2;

        $profclassmsg1 = 'القسم ليس من اختصاص الأستاذ';
        $profclassmsg2 = 'La classe n\'est pas de la compétence du professeur';
        $local == 'ar' ? $profclassmsg = $profclassmsg1 : $profclassmsg = $profclassmsg2;

        if (auth()->user()->role == 'prof') {

            $prof = Prof::find(auth()->user()->prof_id);

            if (ProfClassesResult::where('prof_id', $prof->id)->where('classe_id', $this->classe)->count() == 0) {
                $this->addError('classe', $profclassmsg);
                return;
            }

            if (ProfClassesResult::where('prof_id', $prof->id)->where('mat_id', $this->mat)->count() == 0) {
                $this->addError('mat', $profmatmsg);
                return;
            }
    
        }






        if ($class->mats->whereIn('id', [$this->mat])->count()) {

            return $this->redirect('/'.$local.'/Resultat/Class/'.$this->classe.'/Mats/'.$this->mat.'/Dev/'.$this->exam, navigate: true);

          //  return redirect(app()->getLocale().'/Resultat/Class/'.$this->classe.'/Mats/'.$this->mat.'/Dev/'.$this->exam);
        } else {
            $this->addError('mats', $msg);
            return;
        }

    }

    private function validateRelation($relation, $value, $field, $errorMsg) {
       
        if (($relation->whereIn('id', [$value])->count() == 0)) {

            
            $this->addError($field, $errorMsg);
            return;
        }
    }

    public function render()
    {
        return view('livewire.result-add');
    }
}
