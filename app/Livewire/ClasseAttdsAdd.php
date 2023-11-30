<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Time;
use App\Models\Classe;
use Livewire\Component;
use App\Models\AttdsClass;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class ClasseAttdsAdd extends Component
{
    public $visible = false;

    public $Classes=[];

    #[Rule('required',as: ' ')] 
    public $nbh, $classe, $date;


    public $moy;



    #[On('add')]
    public function open() 
    {      
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset();

        $this->date = Carbon::today()->format('Y-m-d') ;


        $this->visible = true;
    }



    public function save()
    {
        $this->resetErrorBag();
        $this->resetValidation();

       $this->validate();

       $att = AttdsClass::where('classe_id', $this->classe)
         ->where('date', $this->date)
         ->where('time', $this->nbh)
         ->first();

        $armsg = 'هذا القسم لديه سجل في هذا الوقت';
        $frmsg = 'Cette classe a un enregistrement à cette heure';

        $msg = app()->getLocale() == 'ar' ? $armsg : $frmsg;


        if($att)
        {
            $this->addError('classe', $msg);
            return;
        }


      $atds =  AttdsClass::create([
        'time' => $this->nbh,
        'classe_id' => $this->classe,
        'date' => $this->date,
        ]);

        $this->visible = false;
        $this->dispatch('refresh');


        $this->reset('nbh','classe','date');

        $locale = app()->getLocale();

        return $this->redirect("Classe/$atds->id", navigate: true);


       
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
        $this->Classes = Classe::all();

        $Times = Time::select('id', 'time')->get()->map->only(['id', 'time']);

        return view('livewire.classe-attds-add',["Times" => $Times]);
    }
}
