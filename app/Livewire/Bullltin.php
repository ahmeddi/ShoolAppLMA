<?php

namespace App\Livewire;

use App\Models\Classe;
use App\Models\Profil;
use App\Models\Result;
use Livewire\Component;
use App\Models\Etudiant;
use App\Models\Semestre;
use App\Models\Classement;
use App\Models\Proportion;
use App\Models\Recomadation;

class Bullltin extends Component
{
    public $etud, $sem, $mats, $results = [], $number, $classe, $tot = 0, $totmat = 0, $moy, $classmoy, $tots, $note;
    public $header;
    public $moy_classe = 0;
    public $etuds = 0;
    public $classMats = 0;
    public $finalnote = '';

    public $recomendation;


    public function mount()
    {
        $this->initializeData();
        $this->calculateResults();
        $this->calculateTotals();
        $this->calculateNote();

        $this->header = Profil::find(1)->header;

        $this->recomendation = Recomadation::where(
            'semestre_id',
            $this->sem->id
        )->where(
            'etudiant_id',
            $this->etud->id
        )
            ->value('note');
    }

    private function initializeData()
    {
        $this->etud = Etudiant::with('classe')->find($this->etud);
        $this->sem = Semestre::find($this->sem);
        $this->classe = $this->etud->classe->id;
        $this->classmoy = $this->etud->classe->moy;
        $this->mats = Classe::find($this->etud->classe->id)->mats;

        $this->etuds =  Classe::find($this->etud->classe->id)->etuds->count();
        $this->classMats = Classe::find($this->etud->classe->id)->mats->count();
    }

    private function calculateResults()
    {
        if ($this->sem->examens->isNotEmpty()) {
            $this->results = $this->mats->map(function ($mat) {
                $nom = $mat->only('nom', 'id');
                $arrn = [];
                $arrs = 0;
                $exan = 0;
                $devs = 0;

                $notes = '';
                $moy_classe = 0;

                foreach ($this->sem->examens as $index => $dev) {

                    if ($index == 0) {
                        //    dd($dev);

                        $notes =  $this->getNote(
                            $nom['id'],
                            $dev->id
                        );
                    }

                    if ($dev->devoir == 1) {
                        $exan = $this->getExamResult($nom['id'], $dev->id);
                        $this->finalnote = $exan;
                        continue;
                    }

                    $exam = $this->getDevResult($nom['id'], $dev->id);

                    if ($exam && $exam->note) {


                        $arrn[] = $exam->note;
                        $arrs += (float) $exam->note;
                        $devs++;
                    }
                }

                $foix = $this->getProportionFoix($nom['id']);

                $devm = $devs ? $arrs / $devs : '';
                $tot = !$this->classmoy ? ($devs ? round(((floatval($arrs) + floatval($exan)) / ($devs + 1)) * $foix, 2) : '') : floatval($exan);
                $this->calculateTotal($tot, $foix);
                $moys = !$this->classmoy ? ($devs ? round((floatval($arrs) + floatval($exan)) / ($devs + 1), 2) : '') : floatval($exan);

                $moy_classe = Classement::where('semestre_id', $this->sem->id)
                    ->where('classe_id', $this->classe)
                    ->where('mat_id', $nom['id'])
                    ->sum('note');



                $moy_classe = $moy_classe / $this->etuds;

                // dd($moy_classe);



                return [
                    'nom' => $nom['nom'],
                    'devn' => implode(" - ", $arrn),
                    'devm' => $devm,
                    'examn' => $exan,
                    'moy' => $moys,
                    'foix' => $foix,
                    'tot' => round(floatval($tot), 1),
                    'note' => $notes,
                    'moy_classe' => $moy_classe,
                ];
            });
        }
    }

    private function getExamResult($matId, $examenId)
    {
        return Result::where('etudiant_id', $this->etud->id)
            ->where('mat_id', $matId)
            ->where('examen_id', $examenId)
            ->value('note');
    }

    private function getNote($matId, $examenId)
    {
        return Result::where('etudiant_id', $this->etud->id)
            ->where('mat_id', $matId)
            ->where('examen_id', $examenId)
            ->value('note_text');
    }

    private function getDevResult($matId, $examenId)
    {
        return Result::where('etudiant_id', $this->etud->id)
            ->where('mat_id', $matId)
            ->where('examen_id', $examenId)
            ->first();
    }

    private function getProportionFoix($matId)
    {
        $foix = Proportion::where('classe_id', $this->classe)
            ->where('mat_id', $matId)
            ->first();

        return !$this->classmoy ? ($foix ? floatval($foix->foix) : 1) : floatval($foix->tot);
    }

    private function calculateTotal($tot, $foix)
    {
        $this->tot += floatval($tot);
        $this->totmat += $foix;

        $tots = Classement::where('semestre_id', $this->sem->id)
            ->where('classe_id', $this->classe)
            ->where('etudiant_id', $this->etud->id)
            ->sum('note');


        $this->tot = $tots / $this->classMats;
        //  dd($this->tot);

        $moy_classe = Classement::where('semestre_id', $this->sem->id)
            ->where('classe_id', $this->classe)
            ->sum('note');

        // $this->classMats

        $this->moy_classe = $moy_classe / $this->classMats;



        $this->moy_classe = $this->moy_classe / $this->etuds;
    }

    private function calculateTotals()
    {
        /**
         * 
         $this->number = Classement::where('semestre_id', $this->sem->id)
        ->where('classe_id', $this->classe)
        ->where('etudiant_id', $this->etud->id)
        ->value('moy');
         */

        if ($this->totmat) {
            if (!$this->classmoy) {
                $this->moy = round($this->tot / $this->totmat, 1);
            } else {
                $this->moy = round($this->tot);
            }

            $this->number = Classement::where('semestre_id', $this->sem->id)
                ->where('classe_id', $this->classe)
                ->where('etudiant_id', $this->etud->id)
                ->value('moy');
        }
    }

    private function calculateNote()
    {
        $note = [
            1 => "عمل ضعيف - Mauvais travail",
            2 => "يحتاج مزيدا من العمل - A besoin de plus de travail",
            3 => "يمكن ان يكون احسن - Ça pourrait être mieux",
            4 => "عمل مقبول - Passable",
            5 => "لوحة شرف - Tableau d'honneur",
            6 => "تشجيع - Encouragements",
            7 => "تهنئة - Félicitation",
        ];

        if ($this->totmat) {
            if ($this->classmoy) {
                if ($this->moy < 60) {
                    $this->note = $note[1];
                } else if ($this->moy >= 60 && $this->moy < 80) {
                    $this->note = $note[2];
                } else if ($this->moy >= 80 && $this->moy < 90) {
                    $this->note = $note[3];
                } else if ($this->moy >= 90 && $this->moy < 110) {
                    $this->note = $note[4];
                } else if ($this->moy >= 110 && $this->moy < 130) {
                    $this->note = $note[5];
                } else if ($this->moy >= 130 && $this->moy < 150) {
                    $this->note = $note[6];
                } else if ($this->moy > 150) {
                    $this->note = $note[7];
                }
            } else {
                if ($this->moy < 6) {
                    $this->note = $note[1];
                } else if ($this->moy >= 6 && $this->moy < 8) {
                    $this->note = $note[2];
                } else if ($this->moy >= 8 && $this->moy < 9) {
                    $this->note = $note[3];
                } else if ($this->moy >= 9 && $this->moy < 11) {
                    $this->note = $note[4];
                } else if ($this->moy >= 11 && $this->moy < 13) {
                    $this->note = $note[5];
                } else if ($this->moy >= 13 && $this->moy < 15) {
                    $this->note = $note[6];
                } else if ($this->moy > 15) {
                    $this->note = $note[7];
                }
            }
        }
    }

    public function render()
    {
        $this->classmoy ? $this->tots = $this->totmat : $this->tots = 20;


        return view('livewire.bullltin');
    }
}
