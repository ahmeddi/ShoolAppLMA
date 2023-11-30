<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RemisParent extends Model
{
    
    use HasFactory;

    protected $fillable = [
        'motif',
        'parent_id',
        'montant',
        'date',
        'note',
    ];


}
