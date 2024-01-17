<?php

namespace App\Livewire;

use App\Models\Examen;
use App\Models\Semestre;
use Livewire\Component;
use Livewire\Attributes\On;

class Devoirs extends Component
{
    public $sem_id = '2';
    public $devs = [];
    public $sems;

    #[On('refresh')]
    function mount()
    {

        $this->sems = Semestre::select('id', 'nom', 'nomfr')->get();
        $this->devs = Examen::with('sem')->where('semestre_id', $this->sem_id)->get();
    }

    #[On('deletes')]
    function delete($key)
    {
        Examen::find($key)->delete();
        $this->mount();
    }


    public function updateSems()
    {
        if ($this->sem_id == '*') {
            $this->devs = Examen::with('sem')->select('id', 'nom', 'nomfr', 'semestre_id')->get();
        } elseif ($this->sem_id) {
            $this->devs = Examen::with('sem')->where('semestre_id', $this->sem_id)->get();
        }
    }

    public function render()
    {

        return view('livewire.devoirs');
    }
}
