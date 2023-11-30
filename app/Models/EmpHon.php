<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpHon extends Model
{
    use HasFactory;

    protected $fillable = [
        'emp_id',
        'date',
        'mois',
        'annee',
        'montant',
    ];
}
