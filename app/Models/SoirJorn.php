<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SoirJorn extends Model
{
    use HasFactory;

    protected $fillable = [
        'mat_id',
        'class_id',
        'prof_id',
        'time_id',
        'day',
    ];

    public function mat()
    {
        return $this->belongsTo(Mat::class);
    }

    public function prof()
    {
        return $this->belongsTo(Prof::class);
    }

    public function time()
    {
        return $this->belongsTo(Time::class);
    }
    
}
