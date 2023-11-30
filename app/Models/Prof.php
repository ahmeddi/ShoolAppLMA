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
    ];

    use HasFactory, SoftDeletes;

    public function hours()
    {
    	return $this->hasMany(Attandp::class);
    }
}
