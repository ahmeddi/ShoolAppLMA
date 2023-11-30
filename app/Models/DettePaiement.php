<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DettePaiement extends Model
{
    use HasFactory;

    protected $fillable = [
        'entreprise_id',
        'montant',
        'date',
    ];

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }
}
