<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhatsappGroup extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'text',
    ];


    public function etuds()
    {
        return $this->hasMany(WhatsappGroupEtud::class);
    }
}
