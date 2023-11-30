<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examen extends Model
{
    use HasFactory;

    public $timestamps = false;


    public function sem()
    {
    	return $this->belongsTo(Semestre::class,'semestre_id','id');
    }
}
