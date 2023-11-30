<?php

namespace App\Livewire;

use App\Models\Prof;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class ProfEdit extends Component
{
    public $visible = false;


    public $nom;

    public $list;

    public $nomfr;


    public $tel1;

    public $tel2;
    public $nni;
    public $diplom;
    public $se;
    public $ts;
    public $ms;
    public $mid;
    public $sc=0;
    public $jardin=0;
    public $primaire=0;
    public $lycee=0;




    protected $listeners = ['opene' => 'open',];

    function rules()  {
        return[ 
    
    'nom'   => 'required',
    'tel1'   => 'required|unique:profs,tel1,'. $this->mid,
    'nni'   => 'nullable|unique:profs,nni,'. $this->mid,
    'se'   => 'nullable|unique:profs,se,'. $this->mid,
    ];}


    #[On('opene')] 
    public function open($id) 
    {      
        $prof = Prof::find($id);

        $this->nom = $prof->nom;
        $this->nomfr = $prof->nomfr;
        $this->tel1 = $prof->tel1;
        $this->tel2 = $prof->tel2;
        $this->nni = $prof->nni;
        $this->diplom = $prof->diplom;
        $this->se = $prof->se;
        $this->ts = $prof->ts;
        $this->ms = $prof->ms;
        $this->list = $prof->list;
       // $this->sc = $prof->sc;
        $this->jardin = $prof->jardin;
        $this->primaire = $prof->primaire;
        $this->lycee = $prof->lycee;
        

        $this->mid = $prof->id;

        $this->visible = true;

    }


    public function save()
    {

        $this->jardin ? $this->jardin = 1 : $this->jardin = 0;
        $this->primaire ? $this->primaire = 1 : $this->primaire = 0;
        $this->lycee ? $this->lycee = 1 : $this->lycee = 0;

      

        if($this->tel1) 
        { 
            $this->tel1 = Str::replace(' ', '', $this->tel1);
        }
        if($this->tel2)
        {
            $this->tel2 = Str::replace(' ', '', $this->tel2);
        }

        $this->resetErrorBag();
        $this->resetValidation();


        $this->nni == '' ? $this->nni = null : $this->nni = $this->nni;
        $this->se == ''  ? $this->se = null  : $this->se = $this->se;
        $this->ts == ''  ? $this->ts = null  : $this->ts = $this->ts;


        $this->validate();



        $prof = Prof::find($this->mid);



           $this->nni == '' ? $prof->nni = null : $prof->nni = $this->nni;
           $this->se == '' ? $prof->se = null : $prof->se = $this->se;
           $this->ts == '' ? $prof->ts = null : $prof->ts = $this->ts;

           $prof->nom = $this->nom;
           $prof->nomfr = $this->nomfr;
           $prof->tel1 = $this->tel1;
           $prof->tel2 = $this->tel2;
           $prof->diplom = $this->diplom;
           $prof->ms = $this->ms;
           $prof->list = $this->list;
            $prof->jardin = $this->jardin;
            $prof->primaire = $this->primaire;
            $prof->lycee = $this->lycee;



           $prof->save();
   
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
       // dd($this->jardin);
        return view('livewire.prof-edit');
    }
}
