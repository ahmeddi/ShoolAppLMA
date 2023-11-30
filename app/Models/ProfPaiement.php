<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfPaiement extends Model
{
    use HasFactory;

    protected $fillable = [
        'motif',
        'prof_id',
        'emp_id',
        'montant',
        'date',
        'note',
    ];

    public function prof()
    {
        return $this->belongsTo(Prof::class);
    }
}
