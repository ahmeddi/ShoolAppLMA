<?php

namespace App\Livewire;

use App\Models\Mat;
use App\Models\Classe;
use Livewire\Component;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use App\Models\ProfClassesResult;

class ProfClasseMatsEdit extends Component
{
    public $visible = false;
    public $mats = [];
    public $classes = [];

    #[Rule('required',as:' ')]
    public $mat, $classe;

    public $ids;
    public $prof;



    #[On('profcedit')]
    public function open($id) 
    {      
        $clas = ProfClassesResult::find($id);
        $this->mat = $clas->mat_id;
        $this->classe = $clas->classe_id;
        $this->prof = $clas->prof_id;

        $this->ids = $clas->id;

        $this->visible = true;
    }


    public function save()
    {

         $this->resetErrorBag();
         $this->resetValidation();

         $this->validate();


        $clas = ProfClassesResult::find($this->ids);

        $clas->prof_id = $this->prof;
        $clas->classe_id = $this->classe;
        $clas->mat_id = $this->mat;

        $clas->save();
    
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
        $this->mats = Mat::all('id','nom') ;
        $this->classes = Classe::all('id','nom') ;

        return view('livewire.prof-classe-mats-edit');
    }
}
