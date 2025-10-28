<?php

namespace App\Models;

use App\Enums\Sexe;
use Illuminate\Database\Eloquent\Model;

class Animal extends Model
{
       protected $fillable = [
        'rfid_id',
        'animalType_id',
        'color_id',
        'weight',
        'birthDate',
        'sexe',
        'breed_id',
        'dethDate',
        'is_castred',
        'is_seek',
        'farm_id',
    ];
     protected $casts = [
        'birthDate' => 'datetime',
        'dethDate' => 'datetime',
        'sexe' => Sexe::class, // Cast 'sexe' to Sexe enum
    ];
}
