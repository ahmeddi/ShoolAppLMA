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
    	return $this->belongsTo(Classe::class)->orderBy('id','desc');
    }

    public function parent()
    {
    	return $this->belongsTo(Parentt::class)->orderBy('id','desc');
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
    	return $this->hasMany(Fraisetud::class,'etudiant_id','id');
    }


    public function results()
    {
       return $this->hasMany(Result::class);                           
    }



}
