<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    protected $fillable = [
        'prof_id',
        'mat_id',
        'class_id',
        'time',
        'day',
]; 

    public function classe()
    {
        return $this->belongsTo(Classe::class,'class_id','id');
    }

    public function mat()
    {
        return $this->belongsTo(Mat::class);
    }

    public function prof()
    {
        return $this->belongsTo(Prof::class,'prof_id','id');
    }

    use HasFactory;
}
