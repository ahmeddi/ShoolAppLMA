<?php

namespace App\Livewire;

use App\Models\Prof;
use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use App\Services\WhatsappApiService;

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
    public $sc = 0;
    public $jardin = 0;
    public $primaire = 0;
    public $lycee = 0;
    public $college = 0;

    public $pass;
    public $whcode;

    public $wh = 0;





    protected $listeners = ['opene' => 'open',];

    function rules()
    {
        return [

            'nom'   => 'required',
            'tel1'   => 'required|unique:profs,tel1,' . $this->mid,
            'nni'   => 'nullable|unique:profs,nni,' . $this->mid,
            'se'   => 'nullable|unique:profs,se,' . $this->mid,
            'whcode'   => 'required',

        ];
    }


    #[On('opene')]
    public function open($id)
    {
        $prof = Prof::find($id);

        $user = User::where('prof_id', $prof->id)->first();

        if ($user) {
            $this->wh = $user->wh;
        }

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
        $this->college = $prof->college;

        $this->whcode = $prof->whcode;
        $this->pass = $prof->password;





        $this->mid = $prof->id;

        $this->visible = true;
    }


    public function save()
    {

        $this->jardin ? $this->jardin = 1 : $this->jardin = 0;
        $this->primaire ? $this->primaire = 1 : $this->primaire = 0;
        $this->lycee ? $this->lycee = 1 : $this->lycee = 0;
        $this->college ? $this->college = 1 : $this->college = 0;



        if ($this->tel1) {
            $this->tel1 = Str::replace(' ', '', $this->tel1);
        }
        if ($this->tel2) {
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
        $prof->college = $this->college;
        $prof->whcode = $this->whcode;



        $prof->save();


        $user = User::where('prof_id', $prof->id)->first();

        $password = Str::random(8);

        if (!$user or $user->parent_id) {
            User::create([
                'name'   => $prof->tel1,
                'password'  => bcrypt($password),
                'role' => 'prof',
                'tel' => $prof->tel,
                'whatsapp' => $prof->tel2,
                'list' => 1,
                'visible' => 0,
                'wh' => 1,
                'prof_id' => $prof->id,
            ]);

            $prof->update([
                'password'   => $password,
            ]);

            $this->pass = $prof->password;
        } else {
            $user->update([
                'name'   => $prof->tel1,
                // 'password'   => bcrypt($prof->password),
                'visible' => 0,
                'wh' => $this->wh,

            ]);

            $prof->update([
                'password'   => $this->pass,
            ]);
        }

        $this->dispatch('refresh');
        $this->visible = false;
    }

    function sent()
    {
        if ($this->tel1) {
            $this->tel1 = Str::replace(' ', '', $this->tel1);
        }
        if ($this->tel2) {
            $this->tel2 = Str::replace(' ', '', $this->tel2);
        }

        $create = new WhatsappApiService();

        $create->sentPass(
            $this->tel1,
            $this->whcode,
            $this->tel2,
            $this->pass
        );
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
