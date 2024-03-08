<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricule',
        'nom',
        'prenom',
        'sexe',
        'date_nais',
        'lieu_nais',
        'etablissement_origine',
        'annee_entree',
        'avatar',
        'lieu_residence',
        'nom_prenom_pere',
        'profession_pere',
        'contact_pere',
        'nom_prenom_mere',
        'profession_mere',
        'contact_mere',
        'nom_prenom_tuteur',
        'profession_tuteur',
        'contact_tuteur',
        'actif'
    ];
}
