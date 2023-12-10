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
    public $classes = [];
    public $sems = [];
    public $exams = [];
    public $mats = [];

    #[Rule('required')]
    public $classe, $exam, $mat, $sem;


    public function mount()
    {
        $profId = auth()->user()->prof_id;
        $data = $profId ? $this->getMatsAndClassesForProf($profId) : $this->getAllMatsAndClasses();

        $this->mats = $data['mats'];
        $this->classes = $data['classes'];

        $this->sems = Semestre::with('examens')->get();
    }

    private function getMatsAndClassesForProf($profId)
    {
        $prof = Prof::with('mats', 'classes')->find($profId);
        return [
            'mats' => $prof->mats->unique('id'),
            'classes' => $prof->classes->unique('id')
        ];
    }

    private function getAllMatsAndClasses()
    {
        return [
            'mats' => Mat::all('nom', 'id'),
            'classes' => Classe::all('nom', 'id')
        ];
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


        $class =  Classe::with('mats')->find($this->classe);

        $msg = 'القسم لا يدرس هذه المادة';
        $msg2 = 'Le classe n\'enseigne pas cette matière';

        app()->getLocale() == 'ar' ? $msg = $msg : $msg = $msg2;

        $local = app()->getLocale();

        $local = app()->getLocale();

        $profmatmsg1 = 'المادة ليست من اختصاص الأستاذ';
        $profmatmsg2 = 'La matière n\'est pas de la compétence du professeur';
        $local == 'ar' ? $profmatmsg = $profmatmsg1 : $profmatmsg = $profmatmsg2;

        $profclassmsg1 = 'القسم ليس من اختصاص الأستاذ';
        $profclassmsg2 = 'La classe n\'est pas de la compétence du professeur';
        $local == 'ar' ? $profclassmsg = $profclassmsg1 : $profclassmsg = $profclassmsg2;

        $profmatclsmsg1 = 'الاستاذ لا يدرس هذه المادة لهاذا القسم';
        $profmatclsmsg2 = 'Le professeur n\'enseigne pas cette matière à cette classe';

        $local == 'ar' ? $profmatclsmsg = $profmatclsmsg1 : $profmatclsmsg = $profmatclsmsg2;

        if (auth()->user()->role == 'prof') {

            $prof = Prof::find(auth()->user()->prof_id);

            if (ProfClassesResult::where('prof_id', $prof->id)->where('classe_id', $this->classe)->count() == 0) {
                $this->addError('classe', $profclassmsg);
                return;
            }

            if (ProfClassesResult::where('prof_id', $prof->id)->where('mat_id', $this->mat)->count() == 0) {
                dd(1);
                $this->addError('mat', $profmatmsg);
                return;
            }

            if (
                ProfClassesResult::where('prof_id', $prof->id)
                ->where('mat_id', $this->mat)
                ->where('classe_id', $this->classe)
                ->count() == 0
            ) {

                $this->addError('classe', $profmatclsmsg);
                return;
            }
        }



        if ($class->mats->whereIn('id', [$this->mat])->count()) {
            return $this->redirect('/' . $local . '/Resultat/Class/' . $this->classe . '/Mats/' . $this->mat . '/Dev/' . $this->exam, navigate: true);
        } else {
            $this->addError('mats', $msg);
            return;
        }
    }

    private function validateRelation($relation, $value, $field, $errorMsg)
    {

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
