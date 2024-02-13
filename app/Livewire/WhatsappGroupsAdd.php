<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use App\Models\WhatsappGroup;
use Livewire\Attributes\Rule;

class WhatsappGroupsAdd extends Component
{
    public $visible = false;

    #[Rule('required')] 
    public $nom;


    #[On('groupadd')] 
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

       WhatsappGroup::create(['nom'   => $this->nom, 'text' => '']);

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
        return view('livewire.whatsapp-groups-add');
    }
}
