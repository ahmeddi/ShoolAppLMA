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

class AttndsProfsAdd extends Component
{
    public $visible = false;

    #[Rule('required', as: ' ')]
    public $date, $nbh, $prof1, $mat, $classe;

    public $Profs = [];
    public $Mats = [];
    public $Classes = [];
    public $note;

    #[On('openap')]
    public function open()
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset();

        $this->date = Carbon::today()->format('Y-m-d');


        $this->Profs = Prof::all('id', 'nom', 'nomfr');
        $this->Mats = Mat::all('id', 'nom');
        $this->Classes = Classe::all('id', 'nom');


        $this->visible = true;
    }



    public function save()
    {

        $prof = Prof::find($this->prof1);

        $cond =   ProfClass::where('prof_id', $this->prof1)
            ->where('mat_id', $this->mat)
            ->where('classe_id', $this->classe)
            ->get()->count();

        $errmagar = 'الاستاذ لا يدرس هذه المادة لهاذا القسم';
        $errmagfr = 'L\'enseignant n\'enseigne pas cette matière pour cette classe';
        $errmsg = app()->getLocale() == 'ar' ? $errmagar : $errmagfr;


        $this->resetErrorBag();
        $this->resetValidation();

        $this->validate();

        if ($cond == 0 and ($prof->ts == 2)) {
            $this->addError('prof1', $errmsg);
            return;
        }



        Attandp::create([
            'prof_id'   => $this->prof1,
            'nbh'  => $this->nbh,
            'mat_id' => $this->mat,
            'classe_id' => $this->classe,
            'date' => $this->date,
            'note' => $this->note,
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
        return view('livewire.attnds-profs-add');
    }
}
