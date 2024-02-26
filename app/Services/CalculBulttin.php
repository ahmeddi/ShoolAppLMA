<?php

namespace App\Jobs;


namespace App\Services;

use App\Models\Moy;
use App\Models\Classe;
use App\Models\Result;
use App\Models\Etudiant;
use App\Models\Semestre;
use App\Models\Classement;
use App\Models\Proportion;


class CalculBulttin
{


    protected $classeId;
    protected $semId;
    protected $tot = 0, $totmat = 0, $moy, $classmoy, $sem, $classe, $moy_classe;



    public function handle($classeId, $semId, $matId)
    {

        $this->classeId = $classeId;
        $this->semId = $semId;

        $this->classe = Classe::find($this->classeId);

        $this->classmoy = $this->classe->moy;

        $this->sem = Semestre::find($this->semId);

        $etudiants = $this->classe->etuds;

        foreach ($etudiants as $etudiant) {
            $this->calculateStudentResults($etudiant);
        }
    }

    public function comment($etudiantId, $semId, $matId)
    {
        $this->StudentResult($etudiantId, $semId);
    }


    private function StudentResult(Etudiant $etudiant, Semestre $sem)
    {
        $mats = Classe::find($this->classeId)->mats;

        if ($sem->examens->isNotEmpty()) {

            $tots = 0;
            foreach ($mats as $mat) {

                $nom = $mat->only('nom', 'id');
                $arrn = [];
                $arrs = 0;
                $exan = 0;
                $devs = 0;

                foreach ($sem->examens as $dev) {

                    $exam = $this->getDevResult($etudiant->id, $nom['id'], $dev->id);

                    if ($exam && $exam->note) {
                        $arrn[] = $exam->note;
                        $arrs += (float) $exam->note;
                        $devs++;
                    }
                }

                $devm = $devs ? $arrs / $devs : 0;

              //  $moys = !$this->classmoy ? ($devs ? round((floatval($arrs)) / ($devs), 2) : '') : floatval($exan);


                $this->addNote($devm, $etudiant->id, $mat->id);


            };
        }
    }




    private function calculateStudentResults(Etudiant $etudiant)
    {
        $mats = Classe::find($this->classeId)->mats;

        if ($this->sem->examens->isNotEmpty()) {

            $tots = 0;
            foreach ($mats as $mat) {

                $nom = $mat->only('nom', 'id');
                $arrn = [];
                $arrs = 0;
                $exan = 0;
                $devs = 0;

                foreach ($this->sem->examens as $dev) {
                    if ($dev->devoir == 1) {
                        $exan = $this->getExamResult($etudiant->id, $nom['id'], $dev->id);
                        continue;
                    }

                    $exam = $this->getDevResult($etudiant->id, $nom['id'], $dev->id);

                    if ($exam && $exam->note) {
                        $arrn[] = $exam->note;
                        $arrs += (float) $exam->note;
                        $devs++;
                    }
                }

                $foix = $this->getProportionFoix($nom['id']);

            //    $moys = !$this->classmoy ? ($devs ? round((floatval($arrs)) / ($devs), 2) : '') : floatval($exan);


                $devm = $devs ? $arrs / $devs : 0;

                $this->addNote($devm, $etudiant->id, $mat->id);

          //      $this->addMoy($this->classeId, $this->semId, $etudiant->id, $moys);




                /*
                //total point
                $tot = !$this->classmoy ? ($devs ? round(((floatval($arrs) + floatval($exan)) / ($devs + 1)) * $foix, 2) : '') : floatval($exan);

                $tots += intval($tot) ;

                */
            };
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


    private function getExamResult(int $etudiantId, int $matId, int $examenId)
    {
        return Result::where('etudiant_id', $etudiantId)
            ->where('mat_id', $matId)
            ->where('examen_id', $examenId)
            ->value('note');
    }


    private function getDevResult(int $etudiantId, int $matId, int $examenId)
    {
        return Result::where('etudiant_id', $etudiantId)
            ->where('mat_id', $matId)
            ->where('examen_id', $examenId)
            ->first();
    }


    private function getProportionFoix(int $matId)
    {
        $foix = Proportion::where('classe_id', $this->classeId)
            ->where('mat_id', $matId)
            ->first();

        return $foix ? floatval($foix->foix) : 1;
    }



    private function addNote($tots, $etudiantId, $matId)
    {
        $classement = Classement::firstOrCreate([
            'etudiant_id' => $etudiantId,
            'semestre_id' => $this->sem->id,
            'classe_id' => $this->classe->id,
            'mat_id' => $matId,
        ]);

        $classement->note = $tots;
        $classement->save();
    }
    /*
    private function calculateTotals()
    {
        $competitors = Classement::where('semestre_id', $this->sem->id)
        ->where('classe_id', $this->classe->id)
        ->orderBy('note', 'desc')
        ->get();


        foreach ($competitors as $key => $competitor) 
        {
            $competitor->moy = $key + 1;
            $competitor->save();
        }
    }
*/
}
