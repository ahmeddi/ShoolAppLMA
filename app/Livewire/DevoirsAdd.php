<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Examen;
use Livewire\Component;
use App\Models\Semestre;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;

class DevoirsAdd extends Component
{
    public $visible = false;

    public $nom, $nomfr, $date, $devoir = 0, $sems = [], $sem;

    protected $listeners = ['devadd' => 'open',];

    protected $rules =
    [

        'nom'   => 'required',
        'nomfr'   => 'required',
        // 'devoir'   => 'required|not_in:0',
        'sem'   => 'required',

    ];


    #[On('open')]
    public function open()
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset();

        $this->sems = Semestre::all();

        $this->visible = true;
    }

    public function save()
    {


        $this->resetErrorBag();
        $this->resetValidation();


        $this->validate();

        Examen::create([
            'nom'   => $this->nom,
            'nomfr'   => $this->nom,
            'semestre_id'  => $this->sem,
            'devoir'  => $this->devoir,

        ]);

        $this->dispatch('refresh');
        $this->reset();


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
        return view('livewire.devoirs-add');
    }
}
