<?php

namespace App\Livewire;

use App\Models\User;
use App\Models\Parentt;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use App\Services\WhatsappApiService;

class ParentEdit extends Component
{
    

    #[Rule('required')] 
    public $prname,$prnamefr;

    #[Rule('required', as:'')] 
    public $telephone;

    public $whatsapp, $whatsapp2;

    #[Rule('required_if:whatsapp,!=,null', as:'')] 
    public $whcode ;

    #[Rule('required_if:whatsapp2,!=,null', as:'')] 
    public $whcode2 ;

    #[Rule('required|not_in:0')] 
    public $psexe;

    public $visible = false;

    public $pid;

    public $pass;

    public $check ;




    #[On('edit')] 
    public function open($id) 
    {
        $this->resetErrorBag();
        $this->resetValidation();
        $this->pid = $id;

        $parent = Parentt::find($id);

        $this->prname = $parent->nom;
        $this->prnamefr = $parent->nomfr;
        $this->telephone = $parent->telephone;
        $this->whatsapp = $parent->whatsapp;
        $this->whatsapp2 = $parent->whatsapp2;
        $this->psexe = $parent->sexe;
        $this->pass = $parent->password;
        $this->whcode = $parent->whcode;
        $this->whcode2 = $parent->whcode2;


        $user = User::where('parent_id', $parent->id)->first();

        if($user){
            $this->check = $user->wh ? true : false;        
        }

        $this->visible = true;
    }

    function sent()
    {
        if ($this->telephone) {
            $this->telephone = Str::replace(' ', '', $this->telephone);
        }
        if ( $this->whatsapp) {
            $this->whatsapp = Str::replace(' ', '', $this->whatsapp);
        }
        if ( $this->whatsapp2) {
            $this->whatsapp2 = Str::replace(' ', '', $this->whatsapp2);
        }
        
        $create = new WhatsappApiService();

        $create->sentPass(
        $this->telephone,
        $this->whcode,
        $this->whatsapp,
        $this->pass);

        $create->sentPass(
        $this->telephone,
        $this->whcode2,
        $this->whatsapp2,
        $this->pass);
        
        
    }


    public function submit()
    { 

       
        if ($this->telephone) {
            $this->telephone = Str::replace(' ', '', $this->telephone);
        }
        if ( $this->whatsapp) {
            $this->whatsapp = Str::replace(' ', '', $this->whatsapp);
        }
        if ( $this->whatsapp2) {
            $this->whatsapp2 = Str::replace(' ', '', $this->whatsapp2);
        }

        $this->resetErrorBag();
        $this->resetValidation();

        $this->validate();

        $parent = Parentt::find($this->pid);
        $parent->nom = $this->prname;
        $parent->whatsapp = $this->whatsapp;
        $parent->whatsapp2 = $this->whatsapp2;
        $parent->telephone = $this->telephone;
        $parent->sexe = intval($this->psexe);
        $parent->nomfr = $this->prnamefr;
        $parent->whcode = $this->whcode;
        $parent->whcode2 = $this->whcode2;
        $parent->save();

        $user = User::where('parent_id', $parent->id)->first();

        $password = Str::random(8);



        if (!$user) {
            User::create([
                'name'   => $parent->telephone,
              //  'email'  => $parent->telephone,
                'password'  => bcrypt($password),
                'role' => 'parent',
                'tel' => $parent->telephone,
                'whatsapp' => $parent->whatsapp,
                'list' => 1,
                'visible' => 0,
                'wh' => 1,
                'parent_id' => $parent->id,
              ]);

              $parent->update([
                'password'   => $password,
              ]);

              $this->pass = $parent->password;


        }
        else{
            $user->update([
                'name'   => $parent->telephone,
                'parent_id' => $parent->id,
                'wh' => $this->check ,
                'password'   => bcrypt($parent->password),
                'visible' => 0,
              ]);

                $parent->update([
                    'password'   => $this->pass,
                ]);
        }

        
      
        $this->dispatch('refresh');

        $this->resetExcept('pid');

        return <<<'JS'
        whatsapp = '';
        whatsapp2 = '';
        telephone = '';


    JS;



    }

    
    #[Js]
    public function close()
    {
        return <<<'JS'
            $wire.visible = false;
            whatsapp = '';
            whatsapp2 = '';
            telephone = '';

        JS;

        $this->resetExcept('pid');


    }



    public function render()
    {
        return view('livewire.parent-edit');
    }
}
