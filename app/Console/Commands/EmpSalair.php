<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use App\Models\Emp;
use App\Models\EmpSal;
use App\Models\Attandep;
use App\Models\EmpHon;
use Illuminate\Console\Command;

class EmpSalair extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:empSalair';

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

        $from = $date->startOfMonth()->format('Y-m-d') ;

        $to = $date->endOfMonth()->format('Y-m-d') ;

        $dates =[$from, $to];

        // Get all Etudians exept no liste
        $emps = Emp::all();

        // Calculate and save salaries for each etud
        foreach ($emps as $emp) { 

            $heurs = Attandep::where('emp_id',$emp->id)
            ->whereBetween('date',$dates)
            ->sum('nbh');

            $emp->ms ? $emp->ms = $emp->ms : $emp->ms = 0 ;

            // Create a new salary record with the new amount and effective date
            $cotisation = new EmpHon([
                'emp_id' => $emp->id,
                'heurs' => $heurs,
                'montant' => $emp->ms,
                'date' => $date->format('Y-m-d'),
                'mois' => $date->month,
                'annee' => $date->year,
            ]);

            // Save the new salary record
            $cotisation->save();

        }

        $this->info('Salaires calculés avec succès !');
    }
}
