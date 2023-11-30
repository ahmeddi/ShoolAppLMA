<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Mat;
use App\Models\Prof;
use App\Models\Classe;
use App\Models\Attandp;
use Livewire\Component;
use App\Models\ProfClass;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class AttndsProfsEdit extends Component
{
    public $visible = false;

    
    #[Rule('required',as: ' ')] 
    public $date,$nbh,$prof1,$mat,$classe;

    public $Profs=[];
    public $Mats=[];
    public $Classes=[];

    public $att_id;


    #[On('edit')]
    public function open($id) 
    {      
        $this->resetErrorBag();
        $this->resetValidation();

        $att =  Attandp::find($id);

        $this->date = $att->date;
        $this->nbh = $att->nbh;
        $this->prof1 = $att->prof_id;
        $this->mat = $att->mat_id;
        $this->classe = $att->classe_id;

        $this->att_id = $id;

        $this->visible = true;
    }

    function save()  
    {
        $prof = Prof::find($this->prof1);

        $cond =   ProfClass::where('prof_id',$this->prof1)
        ->where('mat_id',$this->mat)
        ->where('classe_id',$this->classe)
        ->get()->count();

        $errmagar = 'الاستاذ لا يدرس هذه المادة لهاذا القسم';
        $errmagfr = 'L\'enseignant n\'enseigne pas cette matière pour cette classe';
        $errmsg = app()->getLocale() == 'ar' ? $errmagar : $errmagfr;

        $this->resetErrorBag();
        $this->resetValidation();
        $this->validate();

        if ($cond == 0 and (($prof->ts == 2) or ($prof->ts == 3))) {
            $this->addError('prof1', $errmsg);
    
            return ;
          }

        $att =  Attandp::find($this->att_id);

        $att->date = $this->date;
        $att->nbh = $this->nbh;
        $att->prof_id = $this->prof1;
        $att->mat_id = $this->mat;
        $att->classe_id = $this->classe;

        $att->save();

        $this->dispatch('refresh');

        $this->visible = false;
        $this->reset();

        
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
        $this->Profs = Prof::all('id','nom');
        $this->Mats = Mat::all('id','nom');
        $this->Classes = Classe::all('id','nom');

        return view('livewire.attnds-profs-edit');
    }
}
