<?php

namespace App\Livewire;

use Carbon\Carbon;
use App\Models\Prof;
use App\Models\Classe;
use App\Models\Profil;
use App\Models\Parentt;
use Livewire\Component;
use App\Models\Etudiant;
use App\Models\Fraisetud;
use Illuminate\Support\Str;
use Livewire\Attributes\Js;
use Livewire\Attributes\On;
use Livewire\WithPagination;
use Livewire\Attributes\Rule;
use App\Livewire\ParentPaiements;
use App\Models\PaiementParent;
use App\Models\User;
use App\Services\SmsService;
use App\Services\WhatsappApiService;

class EtudiantAdd extends Component
{

    use WithPagination;

    public $Classes;

    public $list = 0;

    public $visible = false;

    #[Rule('required')] 
    public $prname,  $prnamefr;

    #[Rule('numeric', as:' ')] 
    public $montant = 0;


    #[Rule('required', as:' ')] 
    public $telephone;

    public $whatsapp;

    #[Rule('required_if:whatsapp,!=,null', as:' ')] 
    public $whcode = '222';

    #[Rule('required|not_in:0', as:' ')] 
    public $psexe;

    #[Rule('required')] 
    public $nom,  $nomfr;

    public $soir;

    public $ddn;

    public $nc;

    #[Rule('required|not_in:0')] 
    public $sexe;

    public $nni;


    #[Rule('required')] 
    public $nb;

    public $nbs;

    #[Rule('required|not_in:0')] 
    public $cls;

    public $etudiant;



    #[On('open')] 
    public function open() 
    {
        $this->resetErrorBag();
        $this->resetValidation();

        $this->visible = true;
    }

    
    public function num()
    {
        $class = Classe::find($this->cls);
    
        if (!$class) {
            $this->nbs = '';
        } elseif ($class->etuds->count()) {
            $lastEtud = $class->etuds->last();
            $this->nbs = intval($lastEtud->nb) + 1;
        } else {
            $this->nbs = 1;
        }
    }


    public function submit()
    { 


       
    if ($this->telephone) {
        $this->telephone = Str::replace(' ', '', $this->telephone);
    }
    if ( $this->whatsapp) {
        $this->whatsapp = Str::replace(' ', '', $this->whatsapp);
    }

    if ($this->montant)
    {
        $this->montant = Str::replace(' ', '', $this->montant);
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
                'whcode'  => $this->whcode,
            ]
        );


        $user = User::where('parent_id', $parent->id)->first();

        if (!$user) {
            User::create([
                'name'   => $parent->telephone,
               // 'email'  => $parent->telephone,
                'password'  => bcrypt($password),
                'role' => 'parent',
                'tel' => $parent->telephone,
                'whatsapp' => $parent->whatsapp,
                'list' => 1,
                'visible' => 0,
                'parent_id' => $parent->id,
              ]);
        }


        

        $etudiant =   Etudiant::create([
            'nom'   => $this->nom,
            'nomfr'  => $this->nomfr,
            'ddn'  => $this->ddn,
            'nc' => $this->nc,
            'sexe' => intval($this->sexe),
            'nni' => $this->nni,
            'nb' => $this->nb,
            'classe_id' => $this->cls,
            'parent_id' => $parent->id,
            'list' => $this->list,
          //  'soir' => $this->soir,
          ]); 

         $profil =  Profil::find(1);

         $recet = $profil->recet;
         $mois = $profil->mois;

         $classMont = $etudiant->classe->prix;

         $frais = (intval($mois) * intval($classMont)) + intval($recet);


        Fraisetud::create([
            'etudiant_id' => $etudiant->id,
            'parent_id' => $parent->id,
            'montant' =>  $frais,
            'motif' => 1,
            'mois'=> Carbon::now()->month,
            'annee'=> Carbon::now()->year,
            'date' => now()->format('Y-m-d'),
          ]);

          if ($this->montant) {
            PaiementParent::create([
                'parent_id' => $parent->id,
                'montant' => $this->montant,
                'date' => now()->format('Y-m-d'),
              ]);
          }
       

        $this->visible = false;



        
        if ($this->whatsapp) 
        {
            
            $whatsapp_msg = new WhatsappApiService();

            $whatsapp_msg->creates(
                $etudiant->nom,
                $etudiant->nomfr,
                $parent->nom,
                $parent->nomfr,
                $etudiant->sexe,
                $parent->sexe,
                $this->whatsapp,
                $this->whcode,
                $password,
            );

        } 
        

      
        $this->dispatch('refresh');

        $this->reset();

        return <<<'JS'
        whatsapp = '';
        telephone = '';
        montant = '';


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
        $this->Classes = Classe::select('id', 'nom')->get();

        return view('livewire.etudiant-add');
    }
}
