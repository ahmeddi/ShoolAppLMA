<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Emp;
use App\Models\Mat;
use App\Models\Prof;
use App\Models\Time;
use App\Models\User;
use App\Models\Classe;
use App\Models\Examen;
use App\Models\Lesson;
use App\Models\Profil;
use App\Models\Parentt;
use App\Models\Etudiant;
use App\Models\Semestre;
use App\Models\DepanceEnt;
use App\Models\Entreprise;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Parent as ModelsParent;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

      //   Classe::factory(10)->create();
      //   Parentt::factory(80)->create();
         Profil::factory()->create();


         $times = [
            [
                'time' => '8H-10H',
            ],
            [
                'time' => '10H-12H',
            ],
            [
                'time' => '12H-14H',
            ],
        ];

        foreach ($times as $time) {
            Time::factory()->create($time);
            

        }

      //   Prof::factory(20)->create();
      //  Mat::factory(20)->create();
    //     Lesson::factory(50)->create();



     //   Emp::factory(20)->create();
    //    Entreprise::factory(20)->create();

    //    Etudiant::factory(100)->create();

        User::factory()->create();

        User::factory()->create([
            'name' =>"admin",
            'password' => Hash::make('1908'), // password
            'role' => 'admin', // Different role
            'visible' => 0,
            ]);





        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


        $semestres = [
            [
                'nom' => 'الفصل الاول',
                'nomfr' => 'Premier Trimestre',
            ],
            [
                'nom' => 'الفصل الثاني',
                'nomfr' => 'Deuxieme Trimestre',
            ],
            [
                'nom' => 'الفصل الثالث',
                'nomfr' => 'Troisieme Trimestre',
            ],
        ];
        


        $exmens = [
            [
                'nom' => 'الاختبار الاول',
                'nomfr' => 'Premier Devoir',
                'devoir' => 0,
            ],
            [
                'nom' => 'الاختبار الثاني',
                'nomfr' => 'Deuxieme Devoir',
                'devoir' => 0,
            ],
            [
                'nom' => 'الاختبار الثالث',
                'nomfr' => 'Troisieme Devoir',
                'devoir' => 0,
            ],

            [
                'nom' => 'الامتحان',
                'nomfr' => 'Examen',
                'devoir' => 1,
            ],

        ];

        foreach ($semestres as $semestreData) {
            $semestre = Semestre::factory()->create($semestreData);
        
            foreach ($exmens as $exmenData) {
                $exmenData['semestre_id'] = $semestre->id;
                Examen::factory()->create($exmenData);
            }
        }


   //     DepanceEnt::factory(7)->create();




    }
}
