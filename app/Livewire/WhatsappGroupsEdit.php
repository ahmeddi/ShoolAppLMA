<?php

namespace App\Livewire;

use App\Models\Classe;
use Livewire\Component;
use App\Models\Etudiant;
use App\Models\WhatsappGroup;
use App\Models\WhatsappGroupEtud;

class WhatsappGroupsEdit extends Component
{
    public $group;

    public $nom;
    public $text;

    public $classes = [];

    public $etuds_list= [];

    public function mount()
    {
        $this->nom = $this->group->nom;
        $this->text = $this->group->text;

        $this->classes = Classe::with('etuds')->get();

        $etuds = Etudiant::all();

        foreach ($etuds as $etud) 
        {
            $att = WhatsappGroupEtud::where('etudiant_id', $etud->id)
                ->where('whatsapp_group_id', $this->group->id)
                ->first();

            if ($att) 
            {
                $this->etuds_list[$etud->id] = 1;
            } 
            else 
            {
                $this->etuds_list[$etud->id] = 0;
            }

        }

    }

    public function save()
    {
        $this->validate([
            'nom' => 'required',
            'text' => 'required',
        ]);

        $this->group->update(['nom' => $this->nom, 'text' => $this->text]);

        $etuds = Etudiant::all();

        foreach ($etuds as  $etud) 
        {

            if ($this->etuds_list[$etud->id]) {

                  WhatsappGroupEtud::create([
                    'etudiant_id' => $etud->id,
                    'whatsapp_group_id' => $this->group->id,
                ]);
            }
            else{

                $record = WhatsappGroupEtud::where('etudiant_id', $etud->id)
                ->where('whatsapp_group_id', $this->group->id)
                ->first();

                if ($record) {
                    $record->delete();
                } 
                
            }

        }

        $this->dispatch('refresh');
    }

    public function render()
    {
        
        return view('livewire.whatsapp-groups-edit');
    }
}
