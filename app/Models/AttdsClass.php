<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AttdsClass extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'classe_id',
        'time',
        'date',
    ];


    public function classe()
    {
        return $this->belongsTo(Classe::class);
    }

    public function time()
    {
        return $this->belongsTo(Time::class);
    }
}
