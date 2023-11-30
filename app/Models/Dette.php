<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dette extends Model
{

    use HasFactory;

    protected $fillable = [
        'entreprise_id',
        'type',
        'montant',
        'interet',
        'start_date',
        'eche',
        'date',
    ];

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }

    public function paiements()
    {
        return $this->hasMany(DettePaiement::class,'dette_id','id');
    }

    public function echeances()
    {
        return $this->hasMany(DetteEch::class);
    }

}
