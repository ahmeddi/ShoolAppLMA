<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'nomfr',
        'header',
        'recet',
        'mois',
        'token',
        'url',
        'site',
    ];
}
