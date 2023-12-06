<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfClassesResult extends Model
{
    use HasFactory;

    protected $fillable = [
        'classe_id',
        'prof_id',
    ];

    
}
