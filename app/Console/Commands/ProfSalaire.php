<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Prof;
use App\Models\Attandp;
use App\Models\ProfHon;
use App\Models\ProfClass;
use Illuminate\Console\Command;

class ProfSalaire extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:ProfSalaire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Calculer le salaire du professeurs';

    /**
     * Execute the console command.
     *
     * @return int
     */

     public $salaire = 0;
     public $totalhours = 0;

    public function handle()
    {
      //  dd('hhh');
                $date = Carbon::now();

                // Get all profs
                $profs = Prof::where('list',1)->get();

              //  $profs = Prof::all();

                $now = Carbon::now();
                $from = $now->startOfMonth()
               //         ->subMonth()
                        ->format('Y-m-d') ;
                $to = $now->endOfMonth()->format('Y-m-d') ;
                $dates =[$from, $to];

               


                foreach ($profs as $prof) {

                    if ($prof->ts == 1) 
                    { // salaire fix

                        $this->totalhours = Attandp::where('prof_id',$prof->id)
                        ->whereBetween('date',$dates)
                        ->sum('nbh');

                        $salaire = intval($prof->ms);

                        $cotisation = new ProfHon([
                            'prof_id' => $prof->id,
                            'heurs' => $this->totalhours,
                            'montant' => $salaire,
                            'date' => $date->format('Y-m-d'),
                            'mois' => $date->month,
                            'annee' => $date->year,
                        ]);
            
                        $cotisation->save();
                    }

                    else if ($prof->ts == 2)
                    {
                        $clases = ProfClass::where('prof_id',$prof->id)->get();

                        $this->salaire = 0;
                        $this->totalhours = 0;

                        foreach ($clases as $mat) {

                            if ($mat->type == 1) { //%

                                $hours = Attandp::where('prof_id',$prof->id)
                                ->where('mat_id',$mat->mat_id)
                                ->where('classe_id',$mat->classe_id)
                                ->whereBetween('date',$dates)
                                ->sum('nbh');

                                $this->totalhours +=  $hours;
                               
                            $etuds =  $mat->classe->etuds;
                            
                            $this->salaire += intval($mat->classe->prix) * intval($etuds->count()) * ((intval($mat->prix))/100);

                            } else if ($mat->type == 2)
                            { // par heure
                                $hours = Attandp::where('prof_id',$prof->id)
                                ->where('mat_id',$mat->mat_id)
                                ->where('classe_id',$mat->classe_id)
                                ->whereBetween('date',$dates)
                                ->sum('nbh');

                                $this->totalhours +=  $hours;


                                
                                $this->salaire += intval($mat->prix) * $hours;

                            }
                            else
                            {
                                $hours = Attandp::where('prof_id',$prof->id)
                                ->where('mat_id',$mat->mat_id)
                                ->where('classe_id',$mat->classe_id)
                                ->whereBetween('date',$dates)
                                ->sum('nbh');

                                $this->totalhours +=  $hours;

                                $this->salaire += intval($mat->prix);

                            }
                                                                                   
                        }


                    $cotisation = new ProfHon([
                                'prof_id' => $prof->id,
                                'heurs' => $this->totalhours,
                                'montant' => $this->salaire,
                                'date' => $date->format('Y-m-d'),
                                'mois' => $date->month,
                                'annee' => $date->year,
                            ]);
                
                            // Save the new salary record
                            $cotisation->save();

                    }


                }

        
                $this->info('Salaires calculés avec succès !');
    }
}
