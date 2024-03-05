<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Schooling extends Model
{
    use HasFactory;

    protected $fillable = [
        'level_id',
        'mtnt_affecte',
        'mtnt_non_affecte',
        'actif'
    ];

    public function level(){
        return $this->belongsTo(Level::class);
    }
}
