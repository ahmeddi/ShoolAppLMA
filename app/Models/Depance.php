<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Depance extends Model
{

    use HasFactory;

    protected $fillable = [
        'depance_ent_id',
        'titre',
        'montant',
        'date',
        'details',
    ];

    public function ent()
    {
        return $this->belongsTo(DepanceEnt::class, 'depance_ent_id', 'id');
    }
}
