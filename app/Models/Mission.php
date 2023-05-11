<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mission extends Model
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
        'adresse_Arriv',
        'condTransp',
        'idChauffeur',
        'heureDebut',
        'heureFin',
    ];
}
