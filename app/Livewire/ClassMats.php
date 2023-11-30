<?php

namespace App\Livewire;

use App\Models\Mat;
use App\Models\Classe;
use Livewire\Component;
use App\Models\Proportion;

class ClassMats extends Component
{
    
    public $cid;
    public $ClsseMoy;
    public $Matts;
    public $Mats;
    public $mats;
    public $valeursFoix = [];
    public $valeursTot = [];

    public function mount()
    {
        // Récupérer les Mats associés à la Classe
        $this->Matts = Mat::select('id', 'nom')->get();
        $classe = Classe::with('mats')->find($this->cid);
        $this->ClsseMoy = $classe->moy;
        $mats = $classe->mats;

        foreach ($this->Matts as $Mat) {

            // Trouver le mat associé à la Classe
            $mat = $mats->firstWhere('id', $Mat->id);

            // Traiter le Mat
            $this->processMat($mat);
        }
    }

    private function processMat($mat)
    {
        if ($mat) {
            // Le Mat est associé à la Classe
            $this->mats[] = true;
            $this->valeursFoix[] = $mat->pivot->foix;
            $this->valeursTot[] = $mat->pivot->tot;
        } else {
            // Le Mat n'est pas associé à la Classe
            $this->mats[] = false;
            $this->valeursFoix[] = 1;
            $this->valeursTot[] = 10;
        }
    }


    public function save()
    {
        foreach ($this->Matts as $index => $Mat) {
            $proportion = Proportion::where('classe_id', $this->cid)
                ->where('mat_id', $Mat->id)
                ->first();

            if ($proportion) {
                $this->updateProportion($proportion, $index);
            } else {
                $this->createProportion($Mat, $index);
            }
        }
    }

    private function updateProportion($proportion, $index)
    {
        if ($this->mats[$index]) {
            $proportion->update([
                'foix' => $this->valeursFoix[$index],
                'tot' => $this->valeursTot[$index],
            ]);
        } else {
            $proportion->delete();
        }
    }

    private function createProportion($Mat, $index)
    {
        if ($this->mats[$index]) {
            Proportion::create([
                'classe_id' => $this->cid,
                'mat_id' => $Mat->id,
                'foix' => $this->valeursFoix[$index],
                'tot' => $this->valeursTot[$index],
            ]);
        }
    }



    public function render()
    {
        return view('livewire.class-mats');
    }
}
