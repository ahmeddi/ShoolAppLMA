<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'prix',
        'moy',
        'soir',
    ];

    public function etuds()
    {
        //order this by name fr
        return $this->hasMany(Etudiant::class)
            ->where(function ($query) {
                $query->whereNull('list')
                    ->orWhere('list', 0);
            })
            ->orderBy('nomfr', 'ASC');
    }

    public function mats()
    {
        return $this->belongsToMany(Mat::class, 'proportions')
            ->withPivot('foix', 'tot');
        //   ->withTimestamps();
    }

    public function times()
    {
        return $this->belongsToMany(Time::class, 'horaires');
    }

    public function profs()
    {
        return $this->belongsToMany(Prof::class, 'prof_classes_results', 'classe_id', 'prof_id');
    }

    public function results()
    {
        return $this->hasMany(Result::class, 'class_id', 'id');
    }

    public function avg($matId)
    {
        // Get all etuds (students) for this class and material
        $etuds = $this->etuds()->with('results')->get();

        // Calculate the total and count of notes
        $totalNote = 0;
        $noteCount = 0;

        foreach ($etuds as $etud) {
            $result = $etud->results->where('mat_id', $matId)->first();

            if ($result) {
                $totalNote += floatval($result->note);
                $noteCount++;
            }
        }

        // Calculate the average note
        $averageNote = ($noteCount > 0) ? ($totalNote / $noteCount) : 0;

        return $averageNote;
    }
}
