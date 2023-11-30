<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfHon extends Model
{
    use HasFactory;

    protected $fillable = [
        'prof_id',
        'emp_id',
        'date',
        'heurs',
        'mois',
        'annee',
        'montant',
    ];
}
