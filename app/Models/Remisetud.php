<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Remisetud extends Model
{
    use HasFactory;

    protected $fillable = [
        'etudiant_id',
        'motif',
        'montant',
        'date',
        'note',
    ];
}
