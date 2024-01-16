<?php

namespace App\Livewire;

use App\Models\Badge;
use Livewire\Component;
use App\Models\BadgeEtud;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class BadgesAdd extends Component
{
    public $visible = false;

    public $badges = [];

    public $etud;


    #[Rule('required')]
    public $nom;



    #[On('add')]
    public function open()
    {
        $this->resetErrorBag();
        $this->resetValidation();

        $this->visible = true;
    }

    public function save()
    {
        $this->resetErrorBag();
        $this->resetValidation();

        $this->validate();

        BadgeEtud::create([
            'badge_id'   => $this->nom,
            'etudiant_id' => $this->etud,
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
        $this->badges = Badge::all('id', 'name');

        return view('livewire.badges-add');
    }
}
