<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attandp extends Model
{
    use HasFactory;

    protected $fillable = [
        'date',
        'nbh',
        'prof_id',
        'mat_id',
        'classe_id',
    ];

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function mat()
    {
        return $this->belongsTo(Mat::class);
    }

    public function prof()
    {
        return $this->belongsTo(Prof::class,'prof_id','id');
    }
}
