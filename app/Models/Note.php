<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'titre',
        'prof',
        'pos',
        'text',
        'etudiant_id',
        'lang',
    ];

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class,'etudiant_id','id');
    }


}
