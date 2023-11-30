<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Parentt;
use App\Services\WhatsappApiService;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class ParentAdd extends Component
{

    public $visible = false;

    #[Rule('required')] 
    public $prname,$prnamefr;


    #[Rule('required', as:'')] 
    public $telephone;

    public $whatsapp,$whcode = '222';

    #[Rule('required|not_in:0')] 
    public $psexe;





    #[On('open')] 
    public function open() 
    {
        $this->resetErrorBag();
        $this->resetValidation();

        $this->visible = true;
    }


    public function submit()
    { 

        if ($this->telephone) {
            $this->telephone = Str::replace(' ', '', $this->telephone);
        }
        if ( $this->whatsapp) {
            $this->whatsapp = Str::replace(' ', '', $this->whatsapp);
        }
       
        $this->resetErrorBag();
        $this->resetValidation();

        $this->validate();


        $password = Str::random(8);

        

        
        $parent = Parentt::updateOrCreate(
            ['telephone' => $this->telephone],
            [
                'nom'   => $this->prname,
                'nomfr'  => $this->prnamefr,
                'whatsapp'  => $this->whatsapp,
                'whcode'  => $this->whcode,
                'sexe' => intval($this->psexe),
                'password'  => ($password),
            ]
        );



        $user = User::where('parent_id', $parent->id)->first();


        if (!$user) {
            User::create([
                'name'   => $parent->telephone,
             //   'email'  => $parent->telephone,
                'password'  => bcrypt($password),
                'role' => 'parent',
                'tel' => $parent->telephone,
                'whatsapp' => $parent->whatsapp,
                'list' => 1,
                'visible' => 0,
                'parent_id' => $parent->id,
              ]);
        }
        else{
            $user->update([
                'name'   => $parent->telephone,
                'parent_id' => $parent->id,
              ]);
        }

        $create = new WhatsappApiService();

        $create->parent($parent->nom,
        $parent->nomfr,
        $parent->sexe,
        $parent->telephone,
        $parent->whatsapp,
        $parent->whcode,
        $password);
        

      
        $this->dispatch('refresh');

        $this->reset();

        return <<<'JS'
        whatsapp = '';
        telephone = '';

    JS;



    }

    
    #[Js]
    public function close()
    {
        return <<<'JS'
            $wire.visible = false;
            whatsapp = '';
            telephone = '';

        JS;

        $this->reset();

    }


    
    public function render()
    {
        return view('livewire.parent-add');
    }
}
