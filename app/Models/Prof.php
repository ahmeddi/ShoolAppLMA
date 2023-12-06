<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prof extends Model
{
    protected $fillable = [
        'nom',
        'nomfr',
        'tel1',
        'tel2',
        'nni',
        'diplom',
        'se',
        'ts',
        'ms',
        'image',
        'list',
        'sc',
        'jardin',
        'primaire',
        'lycee',
        'visible',
        'password',
        'whcode',

    ];

    use HasFactory, SoftDeletes;

    public function hours()
    {
    	return $this->hasMany(Attandp::class);
    }

    public function classes()
    {
    	return $this->belongsToMany(Classe::class, 'prof_classes_results', 'prof_id', 'classe_id');
    }

    public function mats()
    {
    	return $this->belongsToMany(Mat::class, 'prof_mats_results', 'prof_id', 'mat_id');
    }
}
