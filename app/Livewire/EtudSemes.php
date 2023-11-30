<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Semestre;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class EtudSemes extends Component
{
    protected $listeners = ['opensems' => 'open','opensemsclass' => 'openclass',];

    public $visible = false;

    public $sems = [] ;
    public $class = false ;


    #[Rule('required')]
    public $sem;

    public $eid;



    #[On('opensemsclass')] 
    public function openclass($id) 
    {      
        $this->sems = Semestre::get(['id','nom','nomfr']);

        $this->visible = true;

        $this->eid = $id;

        $this->class = true;

    }


    #[On('open')] 
    public function open($id) 
    {      
        
        $this->resetErrorBag();
        $this->resetValidation();

        $this->sems = Semestre::get(['id','nom','nomfr']);

        $this->visible = true;

        $this->eid = $id;

    }

    public function save()
    {

        $this->resetErrorBag();
        $this->resetValidation();

        $this->validate();

        $local = app()->getLocale();

        if ($this->class) {

            return $this->redirect('/'.$local.'/Classe/Results/'.$this->eid.'/Sem/'.$this->sem, navigate: true);

        } else {

            return $this->redirect('/'.$local.'/Resultat/Etudiant/'.$this->eid.'/Sem/'.$this->sem, navigate: true);

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
        return view('livewire.etud-semes');
    }
}
