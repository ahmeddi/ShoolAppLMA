<?php

namespace App\Livewire;

use App\Models\Examen;
use Livewire\Component;
use App\Models\Semestre;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;

class DevoirsEdit extends Component
{
    public $visible = false;

    public $nom, $nomfr, $date, $devoir = 0, $sems = [], $sem, $eid;

    protected $listeners = ['devedit' => 'open',];

    protected $rules =
    [

        'nom'   => 'required',
        'nomfr'   => 'required',
        // 'devoir'   => 'required|not_in:0',
        'sem'   => 'required',

    ];

    public function mount()
    {
        $this->sems = Semestre::select('id', 'nom', 'nomfr')->get();
    }



    #[On('edit')]
    public function open($id)
    {
        $dev = Examen::find($id);
        $this->nom = $dev->nom;
        $this->nomfr = $dev->nomfr;
        $this->sem = $dev->semestre_id;
        $this->eid = $dev->id;


        //  dd($this->sem);


        $this->visible = true;
    }

    public function save()
    {

        $this->resetErrorBag();
        $this->resetValidation();

        $this->validate();

        $dev = Examen::find($this->eid);

        $dev->nom = $this->nom;
        $dev->nomfr = $this->nomfr;
        $dev->semestre_id = $this->sem;

        $dev->save();

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
        return view('livewire.devoirs-edit');
    }
}
