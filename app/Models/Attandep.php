<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attandep extends Model
{
    
    use HasFactory;

    protected $fillable = [
        'date',
        'nbh',
        'emp_id',
    ];

    public function emp()
    {
        return $this->belongsTo(Emp::class, 'emp_id', 'id');
    }
    
}
