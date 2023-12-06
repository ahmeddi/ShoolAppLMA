<?php

namespace App\Livewire;

use App\Models\Mat;
use App\Models\Prof;
use App\Models\Classe;
use Livewire\Component;
use Livewire\Attributes\On;
use App\Models\ProfClassesResult;
use App\Models\ProfMatsResult;

class ProfClasseMats extends Component
{
    public  $classe;

    public $mats = [];
    public $classes = [];

    public $allClasses = [];
    public $allMats = [];


    

    public $att;
    public $att_class_id;
    public $attds = [];

    public $textColors = []; 


    public $date;

    public $time;


    public $ids;

    public $cid;
    public $note =[];

    #[On('refresh')]
    function mount()  
    {
        $this->allClasses = Classe::all();
        $this->allMats = Mat::all();
       // $mats = Mat::all();

        foreach ($this->allClasses as $classe) 
        {
            $class = ProfClassesResult::where('classe_id', $classe->id)
                ->where('prof_id', $this->ids->id)
                ->first();

                $classData = [
                    'id' => $classe->id ,
                    'val' => $class ? 1 : 0,
                ];
            
                $this->classes[] = $classData;

        }

        foreach ($this->allMats as $mats) 
        {
            $mat = ProfMatsResult::where('mat_id', $mats->id)
                ->where('prof_id', $this->ids->id)
                ->first();
            
            $matData = [
                    'id' => $mats->id ,
                    'val' => $mat ? 1 : 0,
                ];

          //  $mat ?  $this->mats[] = 1 : $this->mats[] = 0;
            $this->mats[] = $matData;

        }

    }


    public function save()
    {
      //  dd($this->classes);
        foreach ($this->classes as $class) {

           // dd($class);
            $classe = Classe::find($class['id']);

          //  dd($classe);
            if ($class['val']) {
                ProfClassesResult::updateOrCreate(
                    ['classe_id' => $classe->id, 'prof_id' => $this->ids->id]
                );
            } else {
                ProfClassesResult::where('classe_id', $classe->id)
                    ->where('prof_id', $this->ids->id)
                    ->delete();
            }
        }

        foreach ($this->mats as  $mat) {

            $matt = Mat::find($mat['id']);

            if ($mat['val']) {
                ProfMatsResult::updateOrCreate(
                    ['mat_id' => $matt->id, 'prof_id' => $this->ids->id]
                );
            } else {
                ProfMatsResult::where('mat_id', $matt->id)
                    ->where('prof_id', $this->ids->id)
                    ->delete();
            }
        }
    }


    public function render()
    {
        return view('livewire.prof-classe-mats');
    }
}
