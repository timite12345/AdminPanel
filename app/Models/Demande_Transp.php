<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Demande_Transp extends Model
{
    use HasFactory;
       protected $fillable = [
        'nom',
        'prenom',
        'adresse',
        'tel',
        'dateN',
        'email',
        'conditionTransp',
        'adresseDep',
        'adresseArriv',
        'estUrgent',
        'estTraiter',
        'etbSante',
    ];
}
