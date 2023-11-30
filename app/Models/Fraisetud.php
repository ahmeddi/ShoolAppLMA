<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fraisetud extends Model
{

    use HasFactory;

    protected $fillable = [
        'etudiant_id',
        'motif',
        'date',
        'mois',
        'annee',
        'montant',
        'parent_id',
    ];

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }
}
