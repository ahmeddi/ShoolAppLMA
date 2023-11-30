<?php

namespace App\Livewire;

use App\Models\Profil;
use Livewire\Component;
use Livewire\Attributes\On;

class Sets extends Component
{

    public $token;

    public $url;

    public $site;


    public $nom,$nomfr;


    #[On('refresh')]
    function mount()
    {
        $profil = Profil::find(1);

        $this->token = $profil->token;
        $this->url = $profil->url;
        $this->nom = $profil->nom;
        $this->nomfr = $profil->nomfr;
        $this->site = $profil->site;

    }

    function save()
    {

     //   dd($this->recet);

        $profil = Profil::find(1);

        $profil->update([
            'token' => $this->token,
            'url' => $this->url,
            'nom' => $this->nom,
            'nomfr' => $this->nomfr,
            'site' => $this->site,

        ]);


        $this->dispatch('saved');
    }

    public function render()
    {
        return view('livewire.sets');
    }
}
