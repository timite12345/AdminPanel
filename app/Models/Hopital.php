<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hopital extends Model
{
    use HasFactory;
      protected $fillable = [
        'nom',
        'prenom',
        'email',
        'estUrgent',
        'estFacture',
        'date_Dep',
        'adresse_Dep',
        'condTranspo',
    ];
}
