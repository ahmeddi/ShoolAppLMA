<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfMatsResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'prof_id',
        'mat_id',
    ];
}
