<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'matricule',
        'affecte',
        'interne',
        'nom',
        'prenom',
        'genre',
        'date_nais',
        'lieu_nais',
        'etablissement_origine',
        'annee_entree',
        'boursier',
        'redoublant',
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
        'school_year_id',
        'level_id',
        'nationality_id',
        'actif'
    ];


    public function level(){
        return $this->belongsTo(Level::class);
    }

    public function nationality(){
        return $this->belongsTo(Nationality::class);
    }

    public function avatarUrl(): string {
        return Storage::url($this->avatar);
    }
}
