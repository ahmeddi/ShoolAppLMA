<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classement extends Model
{
    use HasFactory;

    protected $fillable = [
        'etudiant_id',
        'semestre_id',
        'classe_id',
        'note',
        'moy',
        'mat_id',
    ];

    public function etud()
    {
        return $this->belongsTo(Etudiant::class, 'etudiant_id', 'id');
    }
}
