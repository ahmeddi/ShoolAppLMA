<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attande extends Model
{

    protected $fillable = ['date','nbh','etudiant_id','attds_classe_id','wh'];

    
    use HasFactory;
}
