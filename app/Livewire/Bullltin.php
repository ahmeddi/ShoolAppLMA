<?php

namespace App\Livewire;

use App\Models\Classe;
use App\Models\Profil;
use App\Models\Result;
use Livewire\Component;
use App\Models\Etudiant;
use App\Models\Semestre;
use App\Models\Classement;
use App\Models\Moy;
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
    public $abs = 0;

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
                $abs = 0;

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

                    $exam = $this->getDevResult($nom['id'], $dev->id);

                    if ($exam && ($exam->note != null) && $dev->devoir != 1) {

                        if ($exam->note == -1) {
                            $arrn[] = 'ABJ';
                            $this->abs = 1;
                        } else {
                            $arrn[] = $exam->note;
                            $arrs += (float) $exam->note;
                            $devs++;
                            $this->abs = 0;
                        }
                    }
                }

                $foix = $this->getProportionFoix($nom['id']);

                $devm =  $devs ? $arrs / $devs : 0;

                if ($this->abs == 1) {
                    $devm = -1;
                }

                $tot = !$this->classmoy ? ($devs ? round(((floatval($arrs)) / ($devs)) * $foix, 2) : '') : floatval($exan);
                $this->calculateTotal($tot, $foix, $this->abs);
                $moys = !$this->classmoy ? ($devs ? round((floatval($arrs)) / ($devs), 2) : '') : floatval($exan);



                $moy_classe = Classement::where('semestre_id', $this->sem->id)
                    ->where('classe_id', $this->classe)
                    ->where('mat_id', $nom['id'])
                    ->where('note', '>=', 0)
                    ->sum('note');



                $moy_classe = $moy_classe / $this->etuds;



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

        $this->addMoy($this->classe, $this->sem->id, $this->etud->id, $this->tot);

            // dd(round(floatval($this->tot), 2));
/*
            Moy::updateOrCreate(
                [
                    'semestre_id' => $this->sem->id,
                    'etudiant_id' => $this->etud->id,
                ],
                ['moy' => $this->tot]
            );
            */
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

    private function calculateTotal($tot, $foix, $abs)
    {
        // $this->tot += floatval($tot);

        $abs == 1 ? $this->classMats -= 1 :  $this->tot += floatval($tot);

        // $this->totmat += $foix;

        $abs == 1 ? $this->totmat += 0 :  $this->totmat += $foix;

        //dd($this->totmat, $this->tot);

        $tots = Classement::where('semestre_id', $this->sem->id)
            ->where('classe_id', $this->classe)
            ->where('etudiant_id', $this->etud->id)
            ->whereNot('note', '=', -1)
            ->sum('note');


        $this->tot = $tots / $this->classMats;
        //  dd($this->tot);

        $moy_classe = Moy::where('semestre_id', $this->sem->id)
            ->where('classe_id', $this->classe)
            ->sum('note');

        // $this->classMats

        $this->moy_classe = $moy_classe / $this->etuds;

      //  $this->moy_classe = $this->moy_classe / $this->etuds;
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

    function addMoy($class_id, $sem_id, $etud_id, $moy)
    {
        $moyModel = Moy::firstOrCreate([
            'classe_id' => $class_id,
            'semestre_id' => $sem_id,
            'etudiant_id' => $etud_id,
        ]);

        $moyModel->moy = $moy;
        $moyModel->save();
    }

    public function render()
    {
        $this->classmoy ? $this->tots = $this->totmat : $this->tots = 20;


        return view('livewire.bullltin');
    }
}
