<?php

namespace App\Livewire;

use App\Models\Result;
use Livewire\Component;
use App\Services\CalculBulttin;
use App\Models\Mat;

class EtudNotes extends Component
{
    public  $classe,$mat,$dev;

    public $cid;
    public $note =[];
    public $noteText =[];

    public function mount()
    {

        foreach ($this->classe->etuds as $etud) 
        {
               $note = Result::where('etudiant_id',$etud->id)
               ->where('mat_id',$this->mat->id)
               ->where('class_id',$this->classe->id)
               ->where('examen_id', $this->dev->id)
               ->first();

               if ($note) 
               {
                    $this->note[] = $note->note;
                    $this->noteText[] = $note->note_text;
               } 
               
               else 
               {
                    $note = Result::create([
                        'etudiant_id' => $etud->id,
                        'class_id' => $this->classe->id,
                        'mat_id' => $this->mat->id,
                        'examen_id' => $this->dev->id,
                        'note' =>  '',
                        'note_text' =>  '',
                    ]);

                    $this->note[] = '';
                    $this->noteText[] = '';
               }
               
        }

    }

    public function save()
    {
            foreach ($this->classe->etuds as $index => $etud) 
            {

                $note = Result::where('etudiant_id',$etud->id)
                ->where('mat_id',$this->mat->id)
                ->where('class_id',$this->classe->id)
                ->where('examen_id', $this->dev->id)
                ->first();
 
                $note->update([
                    'note' =>  $this->note[$index],
                    'note_text' =>  $this->noteText[$index],
                ]);

            } 

            $this->calculBulttin();
    }

    public function calculBulttin() 
    {
            $semId = $this->dev->sem->id;
            $classeId = $this->classe->id;

            $calcul = new CalculBulttin();

            $calcul->handle($classeId, $semId, $this->mat->id);
            
    }


    
    public function render()
    {
        return view('livewire.etud-notes');
    }
}
