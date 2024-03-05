<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classe extends Model
{
    use HasFactory;

    protected $fillable = [
        'classe',
        'effectif',
        'inscrit',
        'level_id',
        'serie_id',
        'school_year_id',
        'actif'
    ];

    public function level(){
        return $this->belongsTo(Level::class);
    }

    public function serie(){
        return $this->belongsTo(Serie::class);
    }

    public function schoolYear(){
        return $this->belongsTo(SchoolYear::class);
    }
}
