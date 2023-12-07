<?php

namespace App\Livewire;

use App\Models\Mat;
use App\Models\Classe;
use Livewire\Component;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use App\Models\ProfClassesResult;

class ProfClasseMatsAdd extends Component
{
    public $visible = false;
    public $mats = [];
    public $classes = [];


    #[Rule('required',as:' ')]
    public $mat, $classe;
    
    public $ids;


    #[On('pattl')]
    public function open($ids) 
    {      
        
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset();

        $this->mats = Mat::all('id','nom') ;
        $this->classes = Classe::all('id','nom') ;

        $this->ids = $ids;

        $this->visible = true;
    }



    public function save()
    {
        $this->resetErrorBag();
        $this->resetValidation();

        $this->validate();

        $lesson = ProfClassesResult::where('prof_id',$this->ids)
        ->where('classe_id', $this->classe)
        ->where('mat_id',$this->mat)
        ->first();


        if ($lesson !== null) {

            if (app()->getLocale() == 'ar') {  $msg = 'يوجد سجل مطابق'; } 
            else {  $msg = 'Il y a un enregistrement correspondan'; }

            $this->addError('mat', $msg);
            return;
        }
        else{
            ProfClassesResult::create([
                'prof_id'   =>  intval($this->ids),
                'classe_id'  => $this->classe,
                'mat_id'  => $this->mat,
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
        return view('livewire.prof-classe-mats-add');
    }
}
