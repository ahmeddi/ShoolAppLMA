<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpSal extends Model
{
    use HasFactory;

    protected $fillable = [
        'emp_id',
        'motif',
        'date',
        'mois',
        'annee',
        'montant',
    ];

    public function emp()
    {
        return $this->belongsTo(Emp::class);
    }
}
