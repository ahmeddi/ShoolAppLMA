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
        'mat_id',
    ];

    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function prof()
    {
        return $this->belongsTo(Prof::class);
    }

    public function mat()
    {
        return $this->belongsTo(Mat::class);
    }

    

    
}
