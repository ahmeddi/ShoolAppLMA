<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WhatsappGroupEtud extends Model
{
    use HasFactory;

    protected $fillable = ['etudiant_id', 'whatsapp_group_id'];

}
