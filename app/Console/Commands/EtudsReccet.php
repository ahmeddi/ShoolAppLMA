<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Etudiant;
use App\Models\Fraisetud;
use Illuminate\Console\Command;

class EtudsReccet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:EtudsReccet';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'calculer le recette du étudiant';

    /**
     * Execute the console command.
     */
    public function handle()
    {
              //  dd('hhh');
              $date = Carbon::now();

              // Get all Etudians exept no liste
              $etuds = Etudiant::whereNull('list')->orWhere('list', 0)->get();

              // Calculate and save salaries for each etud
              foreach ($etuds as $etud) { 

                  // Create a new salary record with the new amount and effective date
                  $cotisation = new Fraisetud([
                      'etudiant_id' => $etud->id,
                      'parent_id' => $etud->parent_id,
                      'montant' => $etud->classe->prix,
                      'date' => $date->format('Y-m-d'),
                      'mois' => $date->month,
                      'annee' => $date->year,
                      'motif' => 'Monthly payment',

                  ]);
      
                  // Save the new salary record
                  $cotisation->save();

              }
      
              $this->info('Salaires calculés avec succès !');
 
    }
}
