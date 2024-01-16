<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BadgeEtud extends Model
{
    use HasFactory;

    protected $fillable = [
        'etudiant_id',
        'badge_id',
    ];

    public function etudiant()
    {
        return $this->belongsTo(Etudiant::class);
    }

    public function badge()
    {
        return $this->belongsTo(Badge::class);
    }
}
