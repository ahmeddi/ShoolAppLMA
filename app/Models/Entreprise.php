<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entreprise extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'telephone',
        'telephone2',
        'whatsapp',
        'email',
    ];


    public function dettes()
    {
        return $this->hasMany(Dette::class, 'entreprise_id', 'id');
    }

    public function paiements()
    {
        return $this->hasMany(DettePaiement::class, 'entreprise_id', 'id');
    }
}
