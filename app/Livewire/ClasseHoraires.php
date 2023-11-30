<?php

namespace App\Livewire;

use App\Models\Time;
use App\Models\Classe;
use App\Models\Horaire;
use Livewire\Component;

class ClasseHoraires extends Component
{
    public $cid;
    public $Times;
    public $times;

    public function mount()
    {
        // Récupérer les Mats associés à la Classe
        $this->Times = Time::select('id', 'time')->get();
        $classe = Classe::with('times')->find($this->cid);
        $times = $classe->times;


        foreach ($this->Times as $Time) {

            $time = $times->firstWhere('id', $Time->id);

            $this->processMat($time);
        }
    }

    private function processMat($time)
    {
        if ($time) {
            $this->times[] = true;
        } else {
            $this->times[] = false;
        }
    }


    public function save()
    {
        
        foreach ($this->Times as $index => $Time) {
            $proportion = Horaire::where('classe_id', $this->cid)
                ->where('time_id', $Time->id)
                ->first();

            if ($proportion) {
            //    dd(1);
                $this->updateProportion($proportion, $index);
            } else {
              //  dd(2);
              //  dd($index);
                $this->createProportion($Time, $index);
            }
        }
    }

    private function updateProportion($proportion, $index)
    {
        if ($this->times[$index]) 
        {
        
        } 
        else {
            $proportion->delete();
        }
    }

    private function createProportion($Time, $index)
    {
     //   dd($index);
        if ($this->times[$index]) {
         //   dd(3);
            Horaire::create([
                'classe_id' => $this->cid,
                'time_id' => $Time->id,
            ]);
        }
    }



    public function render()
    {
        return view('livewire.classe-horaires');
    }
}
