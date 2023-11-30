<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfClass extends Model
{
    use HasFactory;

    protected $fillable = [
        'prof_id',
        'classe_id',
        'mat_id',
        'prix',
        'type',
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
