<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Hash;

class UsersEdit extends Component
{

    public $visible = false;

    public $whatsapp,$telephone,$idd;


    #[Rule('required',as: ' ')] 
    public $nom, $user, $password;



    #[On('edit')]
    public function open($id) 
    {
        $id = User::find($id);
        
        $this->idd = $id->id;
        $this->nom = $id->name;
        $this->user = $id->role;
        $this->telephone = $id->tel;
        $this->whatsapp = $id->whatsapp;

        $this->visible = true;
    }

    function save() 
    {

        $this->resetErrorBag();
        $this->resetValidation();
        $this->validate();

        User::where('id', $this->idd)->update([
            'name'  => $this->nom,
            'role'   => $this->user,
            'tel'  => $this->telephone,
            'whatsapp' => $this->whatsapp,
            'password' =>  Hash::make($this->password),
        ]);

        $this->visible = false;
        $this->dispatch('refresh');
        
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
        return view('livewire.users-edit');
    }
}
