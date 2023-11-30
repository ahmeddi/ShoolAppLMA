<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Etudiant;
use App\Models\Fraisetud;
use Illuminate\Console\Command;

class EtudsSoir extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:EtudsSoir';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        
              $date = Carbon::now();

              $etuds = Etudiant::whereNull('list')
                                ->orWhere('list', 0)
                                ->where('soir', 1)
                                ->get();

              foreach ($etuds as $etud) { 

                if($etud->classe->soir)
                {
                  $cotisation = new Fraisetud([
                    'etudiant_id' => $etud->id,
                    'parent_id' => $etud->parent_id,
                    'montant' => $etud->classe->soir,
                    'date' => $date->format('Y-m-d'),
                    'mois' => $date->month,
                    'annee' => $date->year,
                    'motif' => 3,

                ]);
    
                $cotisation->save();

                }
              }
      
              $this->info('Salaires calculés avec succès !');
    }
}
