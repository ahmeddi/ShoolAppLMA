<?php

namespace App\Livewire;

use App\Models\Badge;
use Livewire\Component;
use App\Models\BadgeEtud;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;

class BadgesEdit extends Component
{
    public $visible = false;

    public $badges = [];

    public $mid;


    #[Rule('required')]
    public $nom;


    #[On('edit')]
    public function open($id)
    {
        $this->resetErrorBag();
        $this->resetValidation();


        $badge = BadgeEtud::find($id);
        $this->nom = $badge->badge_id;
        $this->mid = $badge->id;

        $this->visible = true;
    }

    public function save()
    {

        $this->resetErrorBag();
        $this->resetValidation();

        $this->validate();

        $badge = BadgeEtud::find($this->mid);

        $badge->badge_id = $this->nom;


        $badge->save();

        $this->dispatch('refresh');
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
        $this->badges = Badge::select('id', 'name')->orderBy('name', 'asc')->get();

        return view('livewire.badges-edit');
    }
}
