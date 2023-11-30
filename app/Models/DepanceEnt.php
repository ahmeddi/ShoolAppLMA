<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepanceEnt extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
    ];

    public function depanses()
    {
        return $this->hasMany(Depance::class, 'depance_ent_id', 'id');
    }
}
