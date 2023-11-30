<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Hash;

class UsersAdd extends Component
{
    public $visible = false;

    public $whatsapp,$telephone;


    #[Rule('required',as: ' ')] 
    public $nom, $user, $password;



    #[On('add')]
    public function open() 
    {      
        
        $this->resetErrorBag();
        $this->resetValidation();
        $this->reset();


        $this->visible = true;
    }



    
    public function save()
    {

        $this->resetErrorBag();
        $this->resetValidation();


        $this->validate();


        User::create([
            'name'  => $this->nom,
            'password'  => Hash::make($this->password),
            'tel'  => $this->telephone,
            'whatsapp' => $this->whatsapp,
            'role' => $this->user,
        ]);

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
        return view('livewire.users-add');
    }
}
