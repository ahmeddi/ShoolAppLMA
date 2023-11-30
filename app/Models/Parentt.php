<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parentt extends Model
{
    use HasFactory;

    protected $table = 'parents';

    protected $fillable = [
        'nom',
        'nomfr',
        'telephone',
        'whatsapp',
        'whcode',
        'telephone2',
        'nni',
        'sexe',
        'password',

    ];

    public function etuds()
    {
        return $this->hasMany(Etudiant::class, 'parent_id');
    }

    public function remises()
    {
        return $this->hasMany(RemisParent::class, 'parent_id');
    }

    public function paiements()
    {
        return $this->hasMany(PaiementParent::class, 'parent_id');
    }

    public function frais()
    {
        return $this->hasMany(Fraisetud::class, 'parent_id');
    }

    

}
