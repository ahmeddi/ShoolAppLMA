<?php

namespace App\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\On;

class Users extends Component
{
    #[On('delete')]
    function delete($key)  
    {
        if (auth()->user()->role != 'admin') {
            return;
        }

        User::where('id', $key)->delete();
        $this->render();

    }

    #[On('refresh')]
    public function render()
    {

        $users = User::where('visible', 1)->get();

     //   $users = User::all();


        return view('livewire.users',['users' => $users]);
    }
}
