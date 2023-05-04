<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facture extends Model
{
    use HasFactory;
      protected $fillable = [
        'nom',
        'hopital',
        'idChauffeur',
        'email_patient',
        'email_hopital',
        'Montant',
        'Maladie',
        'commentaires'
    ];
}
