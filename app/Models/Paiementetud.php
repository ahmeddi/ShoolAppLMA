<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiementetud extends Model
{

    use HasFactory;

    protected $fillable = [
        'etudiant_id',
        'motif',
        'mois',
        'annee',
        'montant',
        'date',
    ];
}
