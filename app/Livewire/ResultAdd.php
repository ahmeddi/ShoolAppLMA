<?php

namespace App\Livewire;

use App\Models\Mat;
use App\Models\Classe;
use App\Models\Examen;
use App\Models\Semestre;
use Livewire\Component;
use Livewire\Attributes\Rule;

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



        if ($class->mats->whereIn('id', [$this->mat])->count()) {

            return $this->redirect('/'.$local.'/Resultat/Class/'.$this->classe.'/Mats/'.$this->mat.'/Dev/'.$this->exam, navigate: true);

          //  return redirect(app()->getLocale().'/Resultat/Class/'.$this->classe.'/Mats/'.$this->mat.'/Dev/'.$this->exam);
        } else {
            $this->addError('mats', $msg);
            return;
        }

    }

    public function render()
    {
        return view('livewire.result-add');
    }
}
