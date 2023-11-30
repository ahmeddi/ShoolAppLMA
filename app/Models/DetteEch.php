<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetteEch extends Model
{

    use HasFactory;

    protected $fillable = [
        'dette_id',
        'montant',
        'nb',
        'date',
        'entreprise_id',
    ];


    public function dette()
    {
        return $this->belongsTo(Dette::class);
    }

    public function entreprise()
    {
        return $this->belongsTo(Entreprise::class);
    }
}
