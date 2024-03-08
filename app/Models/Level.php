<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $fillable = [
        'cycle_id',
        'libelle',
        'code',
        'actif'
    ];

    public function classes(): HasMany
    {
        return $this->hasMany(Classe::class);
    }
}
