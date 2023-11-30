<?php

namespace App\Jobs;

use App\Models\Classe;
use App\Models\Result;
use App\Models\Etudiant;
use App\Models\Semestre;
use App\Models\Classement;
use App\Models\Proportion;
use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class CalculBulttin implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    
    protected $classeId;
    protected $semId;
    protected $tot = 0, $totmat =0, $moy, $classmoy, $sem, $classe;


    public function __construct(int $classeId, int $semId)
    {
        $this->classeId = $classeId;
        $this->semId = $semId;
    }


    public function handle()
    {
        $this->classe = Classe::find($this->classeId);

        $this->classmoy = $this->classe->moy;

        $this->sem = Semestre::find($this->semId);

        $etudiants = $this->classe->etuds;

        foreach ($etudiants as $etudiant) {
            $this->calculateStudentResults($etudiant);
        }

        $this->calculateTotals();
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
                        $arrs += (double) $exam->note;
                        $devs++;
                    }
                }

                $foix = $this->getProportionFoix($nom['id']);

                $devm = $devs ? $arrs / $devs : 0;
                
                //total point
                $tot = !$this->classmoy ? ($devs ? round(((floatval($arrs) + floatval($exan)) / ($devs + 1)) * $foix, 2) : '') : floatval($exan);

                $tots += intval($tot) ;
                
            };

            $this->addNote($tots,$etudiant->id);

        }

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



    private function addNote($tots,$etudiantId)
    {
        $classement = Classement::firstOrCreate([
            'etudiant_id' => $etudiantId,
            'semestre_id' => $this->sem->id,
            'classe_id' => $this->classe->id,
        ]);

        $classement->note = $tots;
        $classement->save();
    }

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

}
