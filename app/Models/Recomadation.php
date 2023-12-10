<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Recomadation extends Model
{
    use HasFactory;

    protected $fillable = [

        'etudiant_id',
        'semestre_id',
        'note',

    ];
}
