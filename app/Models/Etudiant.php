<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Etudiant extends Model
{
    protected $fillable = [
        'nom',
        'prenom',
        'nomfr',
        'prenomfr',
        'tel1',
        'tel2',
        'nni',
        'se',
        'diplom',
        'classe_id',
        'parent_id',
        'sexe',
        'nb',
        'nc',
        'soir',
        'list',
    ];
    use HasFactory, SoftDeletes;


    public function classe()
    {
        return $this->belongsTo(Classe::class)->orderBy('id', 'desc');
    }

    public function parent()
    {
        return $this->belongsTo(Parentt::class)->orderBy('id', 'desc');
    }

    public function hours()
    {
        return $this->hasMany(Attande::class);
    }

    public function notes()
    {
        return $this->hasMany(Note::class);
    }


    public function frais()
    {
        return $this->hasMany(Fraisetud::class, 'etudiant_id', 'id');
    }


    public function results()
    {
        return $this->hasMany(Result::class);
    }

    public function badges()
    {
        return $this->belongsToMany(Badge::class, 'badge_etuds', 'etudiant_id', 'badge_id')->orderBy('id');
    }

    public function moys($semestre_id)
    {
        $notes = Classement::where('semestre_id', $semestre_id)
            ->where('etudiant_id', $this->id)
            ->where('note', '>=', 0);
        //    $notes = $this->hasMany(Classement::class)->where('semestre_id', $semestre_id)->sum('note');
        $count = $notes->count();
        $notes = $notes->sum('note');
        return  $count > 0 ? round($notes / $count, 1) : 0;
    }
}
