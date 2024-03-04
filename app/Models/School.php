<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    use HasFactory;

    protected $fillable = [
        'code',
        'statut',
        'name',
        'abrege',
        'code_postal',
        'email',
        'address',
        'telephon',
        'city',
        'dren',
        'descriptif',
        'avatar',
        'actif',
        'licence_id'
    ];
}
