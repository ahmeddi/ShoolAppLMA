<?php

namespace App\Livewire;

use App\Models\Prof;
use App\Models\Profil;
use App\Models\Time;
use Livewire\Component;
use Livewire\Attributes\On;
use Livewire\Attributes\Rule;
use Illuminate\Support\Facades\Artisan;

class Parametres extends Component
{
    #[Rule('required',as: ' ')]
    public $recet, $mois;


    public $header;
    public $times;

    public $nom, $nomfr;


    #[On('refresh')]
    function mount()
    {
        $profil = Profil::firstOrCreate(['id' => 1 ], [
            'nom' => '',
            'nomfr' => '',
            'recet' =>500,
            'mois' => 2,
        ]);

        $this->times = Time::all()->slice(3);


        $this->nom = $profil->nom;
        $this->nomfr = $profil->nomfr;
        $this->header = $profil->header;
        $this->recet = $profil->recet;
        $this->mois = $profil->mois;

    }

    function save()
    {

     //   dd($this->recet);

        $profil = Profil::find(1);

        $profil->update([
            'nom' => $this->nom,
            'nomfr' => $this->nomfr,
            'header' => $this->header,
            'recet' => $this->recet,
            'mois' => $this->mois,
        ]);


        $this->dispatch('saved');
    }

    function etud()  
    {
        Artisan::call('command:EtudsReccet');
    }

    function prof()  
    {
        Artisan::call('command:ProfSalaire');
    }

    function emp()  
    {
        Artisan::call('command:empSalair');
    }

    function soir()  
    {
        Artisan::call('command:EtudsSoir');
    }


    #[On('delete')]
    function delete($key)  
    {
       Time::find($key)->delete();
        $this->mount();

    }




    public function render()
    {
        return view('livewire.parametres');
    }
}
