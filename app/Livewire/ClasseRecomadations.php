<?php

namespace App\Livewire;

use App\Models\Recomadation;
use Livewire\Component;

class ClasseRecomadations extends Component
{
    public $sem, $etuds;

    public $notes = [];

    public function mount()
    {
        foreach ($this->etuds as $etud) {
            $recomadation = Recomadation::firstOrCreate([
                'etudiant_id' => $etud->id,
                'semestre_id' => $this->sem,
            ], [
                'note' => null,
            ]);

            if ($recomadation->note !== null) {
                $this->notes[] = [
                    'id' => $etud->id,
                    'note' => $recomadation->note,
                ];
            } else {
                $this->notes[] = [
                    'id' => $etud->id,
                    'note' => null,
                ];
            }
        }
    }


    public function save()
    {
        // dd($this->notes);

        foreach ($this->notes as $index => $note) {
            Recomadation::updateOrCreate([
                'etudiant_id' => $note['id'],
                'semestre_id' => $this->sem,
            ], [
                'note' => $note['note'],
            ]);
        }
    }



    public function render()
    {
        return view('livewire.classe-recomadations');
    }
}
